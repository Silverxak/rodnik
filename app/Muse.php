<?php namespace App;

use Illuminate\Support\Collection;

class Muse {

	/**
	 * @return string
	 */
	
	public static function quote()
	{
		return Collection::make([

			'Чему бы ты ни учился, ты учишься для себя. - Петроний',
			'Кто в учениках не бывал, тот учителем не будет. - Боэций',
			'Не стыдись учиться в зрелом возрасте: лучше научиться поздно, чем никогда. - Эзоп',
			'Сколько б ты ни жил, всю жизнь следует учиться. - Сенека',
			'Надо много учиться, чтобы знать хоть немного. - Монтескье',
			'Образование — лицо разума. - Кей-Кавус',

		])->random();
	}

}