<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *    id integer NOT NULL,
	barcode_book bigint,
	barcode_reader bigint,
	date_start date,
	date_finish date,
	status integer
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function($table){
			$table->integer('id');
			$table->bigInteger('barcode_book')->nullable();
			$table->bigInteger('barcode_reader')->nullable();
			$table->date('date_start')->nullable();
			$table->date('date_finish')->nullable();
			$table->integer('status')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}

}
