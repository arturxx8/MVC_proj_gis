<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *CREATE TABLE department (
	id integer NOT NULL,
	departmentname character varying(512) NOT NULL
	);
	 * @return void
	 */
	public function up()
	{
		Schema::create('department', function($table){
			$table->integer('id');
			$table->string('departmentname', 512);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('department');
	}

}
