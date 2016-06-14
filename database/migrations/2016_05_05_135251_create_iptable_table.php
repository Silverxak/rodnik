<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIptableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iptable', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('adds');
			$table->string('mask');
		});

		Schema::table('iptable', function($table)
		{
			$table->unique(['adds', 'mask']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('iptable');
	}

}
