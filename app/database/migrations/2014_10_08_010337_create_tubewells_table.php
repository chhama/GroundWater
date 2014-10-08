<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTubewellsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tubewells', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tubewell_code');
			$table->integer('delivery_id');
			$table->integer('district_id');
			$table->integer('block_id');
			$table->integer('panchayat_id');
			$table->string('location');
			$table->string('sub_location');
			$table->string('landmark');
			$table->decimal('latitude',11,6);
			$table->decimal('longitude',11,6);
			$table->string('elevation');
			$table->integer('office_zone_id');
			$table->integer('office_circle_id');
			$table->integer('office_division_id');
			$table->integer('office_sub_division_id');
			$table->integer('office_section_id');
			$table->string('depth_swl',20);
			$table->string('depth_boring',20);
			$table->string('size_boring',20);
			$table->date('drilling_date');
			$table->date('commission_date');
			$table->string('discharge',20);
			$table->string('platform',10);
			$table->string('well_status',30);
			$table->date('well_status_date');
			$table->string('well_status_note');
			$table->string('well_status_nature_damage');
			$table->string('well_status_action');
			$table->date('well_status_repaired_date');
			$table->string('well_status_repaired_by');
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
		Schema::drop('tubewells');
	}

}
