<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTestTable extends Migration {

	public function up()
	{
		Schema::create('history_test', function(Blueprint $table)
		{
			$table->increments('history_test_id')->unsigned();
			$table->integer('test_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('test_name');
			$table->string('student_name');
			$table->integer('high')->unsigned();
			$table->integer('middle')->unsigned();
			$table->integer('low')->unsigned();
			$table->integer('score')->unsigned();
			$table->integer('mark')->unsigned();
			$table->timestamps();
		});

	}

	public function down()
	{
		Schema::drop('history_test');
	}
}




