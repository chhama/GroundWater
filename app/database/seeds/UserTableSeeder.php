<?php 
	class UserTableSeeder extends Seeder {
		public function run(){
			DB::table('users')->delete();

			User::create(array(
					'username' => 'admin',
					'usertype' => 'administrator',
					'name' => 'Admin guy',
					'remember_token' => '',
					'password' => Hash::make('pass')
				));
		}
	}


 ?>