<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTableRepairForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('quastion', function($table)
		{
		    $table->dropForeign('quastion_group_quastion_id_foreign');
			$table->foreign('group_quastion_id')->references('id')->on('group_quastion')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('quastion', function($table)
		{
		    $table->dropForeign('quastion_group_quastion_id_foreign');
			$table->foreign('group_quastion_id')->references('id')->on('testlist')->onDelete('cascade')->onUpdate('cascade');
		});
	}

}
