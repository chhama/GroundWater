<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLithologiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lithologies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tubewell_id');
			$table->string('depth_from',10);
			$table->string('depth_to',10);
			$table->string('soil_class');
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
		Schema::drop('lithologies');
	}	

}
