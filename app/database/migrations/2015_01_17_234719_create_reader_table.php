<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * CREATE TABLE reader (
	id integer NOT NULL,
	barcode bigint NOT NULL,
	surname character varying(20),
	name character varying(20),
	patronymic character varying(20),
	datebirth date,
	organization integer,
	department integer,
	position character varying(40),
	address character varying(128),
	telephone character varying(32),
	login character varying(12),
	password character varying(64),
	url_pic character varying(8)
	);
	 */
	public function up()
	{
		Schema::create('reader', function($table) {
			$table->increments('id');
			$table->bigInteger('barcode');
			$table->string('surname', 20)->nullable();
			$table->string('name', 20)->nullable();
			$table->string('patronymic', 20)->nullable();
			$table->date('datebirth')->nullable();
			$table->integer('organization')->nullable();
			$table->integer('department')->nullable();
			$table->string('position', 40)->nullable();
			$table->string('address', 128)->nullable();
			$table->string('telephone', 32)->nullable();
			$table->string('login', 12)->nullable();
			$table->string('password', 64)->nullable();
			$table->string('url_pic', 8)->nullable();
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('reader');
	}

}
