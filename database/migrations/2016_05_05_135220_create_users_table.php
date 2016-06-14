<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('login')->unique();
			$table->string('password', 60);
			$table->boolean('is_admin')->default(0);
			$table->integer('group_id')->unsigned()->default(0);
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::table('users', function($table)
		{
			$table->foreign('group_id')->references('id')->on('group')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
