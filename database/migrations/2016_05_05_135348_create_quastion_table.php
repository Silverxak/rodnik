<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuastionTable extends Migration {

	public function up()
	{
		Schema::create('quastion', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('group_quastion_id')->unsigned();
			$table->string('caption')->unique();
			$table->integer('variant')->unsigned();
			$table->timestamps();
		});

		Schema::table('quastion', function($table)
		{
			$table->foreign('group_quastion_id')->references('id')->on('testlist')->onDelete('cascade')->onUpdate('cascade');
			$table->unique(['group_quastion_id', 'caption']);
		});
	}

	public function down()
	{
		Schema::drop('quastion');
	}

}




