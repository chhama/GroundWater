<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterQualityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('water_quality', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tubewell_id');
			$table->string('ph',10);
			$table->string('colour',10);
			$table->string('odour',20);
			$table->string('taste',20);
			$table->string('turbidity',10);
			$table->string('caco3',10);
			$table->string('ammonia',10);
			$table->string('iron',10);
			$table->string('chlorides',10);
			$table->string('free_residual',10);
			$table->string('dissolved_solid',10);
			$table->string('calcium',10);
			$table->string('magnesium',10);
			$table->string('copper',10);
			$table->string('manganese',10);
			$table->string('sulphate',10);
			$table->string('nitrates',10);
			$table->string('fluoride',10);
			$table->string('phenolic',10);
			$table->string('mercury',10);
			$table->string('cadmium',10);
			$table->string('selenium',10);
			$table->string('arsenic',10);
			$table->string('cyanide',10);
			$table->string('lead',10);
			$table->string('zinc',10);
			$table->string('anionic',10);
			$table->string('chromium',10);
			$table->string('polynuclear',10);
			$table->string('mineral_oil',10);
			$table->string('pesticides',10);
			$table->string('radioactive',10);
			$table->string('alkalinity',10);
			$table->string('aluminium',10);
			$table->string('boron',10);
			$table->string('nickel',10);
			$table->string('ecoli',10);
			$table->string('tested_by',100);
			$table->date('test_date');
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
		Schema::drop('water_quality');
	}

}
