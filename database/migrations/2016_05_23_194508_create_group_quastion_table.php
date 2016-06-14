<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupQuastionTable extends Migration {

	public function up()
	{
		Schema::create('group_quastion', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title'); 
			$table->integer('test_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('group_quastion', function($table)
		{
			$table->foreign('test_id')->references('id')->on('testlist')->onDelete('cascade')->onUpdate('cascade');
		});

	}

	public function down()
	{
		Schema::drop('group_quastion');
	}

}