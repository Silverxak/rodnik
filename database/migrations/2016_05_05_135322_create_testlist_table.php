<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestlistTable extends Migration {

	public function up()
	{
		Schema::create('testlist', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->unique();
			$table->integer('qcount')->unsigned();
			$table->integer('excellent')->unsigned();
			$table->integer('good')->unsigned();
			$table->integer('satisfactory')->unsigned();
			$table->integer('min')->unsigned();
			$table->integer('sec')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('testlist');
	}

}



