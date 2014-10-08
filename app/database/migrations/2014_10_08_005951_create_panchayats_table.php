<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanchayatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('panchayats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('district_id');
			$table->integer('block_id');
			$table->string('name');
			$table->string('code',10);
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
		Schema::drop('panchayats');
	}

}
