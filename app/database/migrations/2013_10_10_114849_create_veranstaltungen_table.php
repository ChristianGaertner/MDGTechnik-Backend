<?php

use Illuminate\Database\Migrations\Migration;

class CreateVeranstaltungenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veranstaltungen', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('loc');
			$table->string('author');
			$table->string('email');
			$table->string('timespan');
			$table->string('date');
			$table->text('notes');
			$table->text('req');
			$table->text('status');
			$table->text('status_type');
			$table->text('status_message');
			$table->string('workers');
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
		Schema::drop('veranstaltungen');
	}

}