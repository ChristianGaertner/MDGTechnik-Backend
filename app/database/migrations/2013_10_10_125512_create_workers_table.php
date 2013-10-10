<?php

use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workers', function($table) {
			$table->increments('id');
			$table->string('sound');
			$table->string('light');
			$table->string('extra');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('workers');
	}

}