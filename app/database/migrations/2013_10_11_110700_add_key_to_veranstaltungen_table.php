<?php

use Illuminate\Database\Migrations\Migration;

class AddKeyToVeranstaltungenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('veranstaltungen', function($table) {
			$table->string('key')->unique();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('veranstaltungen', function($table) {
			$table->dropColumn('key');
		});
	}

}