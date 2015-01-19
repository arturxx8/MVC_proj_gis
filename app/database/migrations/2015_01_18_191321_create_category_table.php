<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * CREATE TABLE category (
	id bigint NOT NULL,
	parent_id bigint,
	type smallint,
	category_name character varying(127)
	);
	 */
	public function up()
	{
		Schema::create('category', function($table){
			$table->bigInteger('id');
			$table->bigInteger('parent_id')->nullable();
			$table->smallInteger('type')->nullable();
			$table->string('category_name', 127)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category');
	}

}
