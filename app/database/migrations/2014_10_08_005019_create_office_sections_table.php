<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('office_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('office_zone_id');
			$table->integer('office_circle_id');
			$table->integer('office_division_id');
			$table->integer('office_sub_division_id');
			$table->string('name');
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
		Schema::drop('office_sections');
	}

}
