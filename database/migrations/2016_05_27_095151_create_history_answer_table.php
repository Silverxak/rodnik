<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryAnswerTable extends Migration {

	public function up()
	{
		Schema::create('history_answer', function(Blueprint $table)
		{
			$table->increments('history_answer_id')->unsigned();
			$table->integer('answer_id')->unsigned();
			$table->integer('history_quastion_id')->unsigned();							
			$table->boolean('is_true')->default(0);	
			$table->string('content');	
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('history_answer');
	}
}



