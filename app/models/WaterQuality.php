<?php 
	class WaterQuality extends Eloquent {
		protected $table = 'water_quality';

		protected $fillable = [
			'tubewell_id',
			'ph',
			'colour',
			'odour',
			'taste',
			'turbidity',
			'caco3',
			'ammonia',
			'iron',
			'chlorides',
			'free_residual',
			'dissolved_solids',
			'calcium',
			'magnesium',
			'copper',
			'manganese',
			'sulphate',
			'nitrates',
			'fluoride',
			'phenolic',
			'mercury',
			'cadmium',
			'selenium',
			'arsenic',
			'cyanide',
			'lead',
			'zinc',
			'anionic',
			'chromium',
			'polynuclear',
			'mineral_oil',
			'pesticides',
			'radioactive',
			'alkalinity',
			'aluminium',
			'nickel',
			'boron',
			'ecoli',
			'tested_by',
			'test_date'
		];

	}


 