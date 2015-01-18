<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * CREATE TABLE author (
	id integer NOT NULL,
	author_fio character varying(128)
	);
	 */
	public function up()
	{
		Schema::create('author', function($table) {
			$table->integer('id');
			$table->string('author_fio', 128);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('author');
	}

}
