<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WordinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wordinfos', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('definition',500);
			$table->string('parts_of_speech',25);
			
			
			//$table->foreign('id')->references('id')->on('listwords');


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
		Schema::drop('wordinfos');
	}

}
