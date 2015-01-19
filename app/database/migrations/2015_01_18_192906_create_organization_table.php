<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration {

	/**
	 * Run the migrations.
	 *CREATE TABLE organization (
	id integer NOT NULL,
	organizationName character varying(256)
	);
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization', function($table){
			$table->integer('id');
			$table->string('organizationname', 256)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organization');
	}

}
