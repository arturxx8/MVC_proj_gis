<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *CREATE TABLE language (
	id integer NOT NULL,
	language_name character varying(63)
	);
	 * @return void
	 */
	public function up()
	{
		Schema::create('language', function($table){
			$table->integer('id');
			$table->string('language_name',63)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('language');
	}

}
