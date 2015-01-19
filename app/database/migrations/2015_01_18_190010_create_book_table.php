<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 * CREATE TABLE book (
	id_book bigint NOT NULL,
	barcode_book bigint NOT NULL,
	title character varying(256),
	author bigint,
	dopauthor bigint,
	dopauthor2 bigint,
	publish character varying(128),
	text text,
	totalpages character varying(8),
	location character varying(32),
	bbk character varying(32),
	isbn character varying(32),
	book_leng integer,
	status integer,
	year character varying(16),
	inventar character varying(128),
	category bigint,
	dateinventar date,
	datereg date,
	price real,
	doc_id bigint,
	place_publish character varying(128));
	 */
	public function up()
	{
		Schema::create('book', function($table) {
		$table->bigInteger('id_book');
		$table->bigInteger('barcode_book');
		$table->string('title', 256)->nullable();
		$table->bigInteger('author')->nullable();
		$table->bigInteger('dopauthor')->nullable();
		$table->bigInteger('dopauthor2')->nullable();
		$table->string('publish', 128)->nullable();
		$table->text('text')->nullable();
		$table->string('totalpages', 8)->nullable();
		$table->string('location', 32)->nullable();
		$table->string('bbk', 32)->nullable();
		$table->string('isbn', 32)->nullable();
		$table->integer('book_leng')->nullable();
		$table->integer('status')->nullable();
		$table->string('year', 16)->nullable();
		$table->string('inventar', 128)->nullable();
		$table->bigInteger('category')->nullable();
		$table->date('dateinventar')->nullable();
		$table->date('datereg')->nullable();
		$table->float('price')->nullable();
		$table->bigInteger('doc_id')->nullable();
		$table->string('place_publish',128)->nullable();
	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book');
	}

}
