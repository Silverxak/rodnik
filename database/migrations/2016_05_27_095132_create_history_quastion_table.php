<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryQuastionTable extends Migration {

	public function up()
	{
		Schema::create('history_quastion', function(Blueprint $table)
		{
			$table->increments('history_quastion_id')->unsigned();
			$table->integer('quastion_id')->unsigned();
			$table->string('caption');			
			$table->timestamps();
		});

	}

	public function down()
	{
		Schema::drop('history_quastion');
	}
}




