<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration {

	public function up()
	{
		Schema::create('answer', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->boolean('is_true')->default(0);
			$table->string('content');
			$table->integer('quastion_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('answer', function($table)
		{
			$table->foreign('quastion_id')->references('id')->on('quastion')->onDelete('cascade')->onUpdate('cascade');
			$table->unique(['quastion_id', 'content']);
		});
	}

	public function down()
	{
		Schema::drop('answer');
	}

}


