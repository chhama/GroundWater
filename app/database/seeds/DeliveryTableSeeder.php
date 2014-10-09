<?php 
	class DeliveryTableSeeder extends Seeder {
		public function run(){
			DB::table('deliveries')->delete();

			User::create(array(
					'name' => 'HP Mark II'
				));
			User::create(array(
					'name' => 'HP Mark III'
				));
			User::create(array(
					'name' => 'Submersible Pump'
				));
		}
	}


 ?>