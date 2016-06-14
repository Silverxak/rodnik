<?php namespace App;

use DB;
use App\Exceptions\ImportException;

class Import
{
	public static function testFromXmlString($xml_string)
	{
		$xml_service = new \Sabre\Xml\Service();

		$tests_data = $xml_service->parse($xml_string);

		DB::beginTransaction();

		try
		{
			foreach($tests_data as $test_data)
			{
				$lectures_data = $test_data['value'];
				$test_data = $test_data['attributes'];

				$test = Test::where('title', '=', $test_data['caption'])->first();

				if(!$test)
				{
					$test = new Test();
					$test->title = $test_data['caption'];
				}
				
				$test->qcount = $test_data['qcount'];
				$test->excellent = $test_data['bal5'];
				$test->good = $test_data['bal4'];
				$test->satisfactory = $test_data['bal3'];
				$test->min = $test_data['minutes'];
				$test->sec = $test_data['seconds'];
				$test->save();

				$not_delete_group_question_ids = [];

				foreach($lectures_data as $lecture_data)
				{
					$variants_data = $lecture_data['value'];
					$lecture_data = $lecture_data['attributes'];

					$group = GroupQuestion::where('title', '=', $lecture_data['name'])->where('test_id', '=', $test->id)->first();

					if(!$group)
					{
						$group = new GroupQuestion();
						$group->title = $lecture_data['name'];
						$group->test_id = $test->id;
						$group->save();
					}

					$not_delete_group_question_ids[] = $group->id;

					$not_delete_question_ids = [];

					foreach($variants_data as $variant_data)
					{
						$questions_data = $variant_data['value'];
						$variant_name = $variant_data['attributes']['name'];

						foreach($questions_data as $question_data)
						{
							$answers_data = $question_data['value'];
							$question_data = $question_data['attributes'];

							$question = Question::where('group_quastion_id', '=', $group->id)
							                    ->where('caption', '=', $question_data['text'])
							                    ->where('variant', '=', $variant_name)
							                    ->first();

							if(!$question)
							{
								$question = new Question();
								$question->group_quastion_id = $group->id;
								$question->caption = $question_data['text'];
								$question->variant = $variant_name;
								$question->save();
							}

							$not_delete_question_ids[] = $question->id;

							$not_delete_answer_ids = [];

							foreach($answers_data as $answer_data)
							{
								$answer_data = $answer_data['attributes'];

								$answer = Answer::where('quastion_id', '=', $question->id)
								                ->where('content', '=', $answer_data['text'])
								                ->first();

								if(!$answer)
								{
									$answer = new Answer();
									$answer->quastion_id = $question->id;
									$answer->content = $answer_data['text'];
								}

								$answer->is_true = $answer_data['right'];
								$answer->save();

								$not_delete_answer_ids[] = $answer->id;
							}

							Answer::where('quastion_id', '=', $question->id)->whereNotIn('id', $not_delete_answer_ids)->delete();
						}
					}

					Question::where('group_quastion_id', '=', $group->id)->whereNotIn('id', $not_delete_question_ids)->delete();
				}

				GroupQuestion::where('test_id', '=', $test->id)->whereNotIn('id', $not_delete_group_question_ids)->delete();
			}

			DB::commit();
		}
		catch(\Exception $e){
			DB::rollBack();

			throw $e;
		}
	}

	public static function studentFromTxtString($file)
	{

		$path = $file->getPathname();
		$fname = $file->getClientOriginalName();

		$pattern = '/.*(?=\.[txt|doc|docx|odt])/';
		preg_match($pattern, $fname, $matches);
		$label_for_group = $matches[0];

		$sudent_data = fopen($path, 'r');
		$students = array();

		$patt = '/\r\n|\r|\n/';
		while (!feof($sudent_data)) 
		{
		    $students[] = preg_replace($patt, '', fgets($sudent_data));
		}
		fclose($sudent_data);
		
		DB::beginTransaction();

		try
		{
			$group = Group::where('label', '=', $label_for_group)->first();

			if(!$group)
			{
				$group = new Group();
				$group->label = $label_for_group;
				$group->save();
			}

			$num = 0;
			foreach ($students as $student) {
				
				$user = new User();
				$user->name = $student;
				$user->login = $label_for_group . strval($num++);
				$user->visible_pass = str_random(8);
				$user->password = bcrypt($user->visible_pass);
				$user->is_admin = false;
				$user->group_id = $group->id;
				$user->save();
			}

			DB::commit();
		}
		catch(\Exception $e)
		{
			DB::rollBack();

			throw $e;			
		}
	}

}
