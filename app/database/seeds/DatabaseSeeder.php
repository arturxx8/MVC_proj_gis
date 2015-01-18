<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		User::create(array(
    	'barcode' => '1',
    	'surname' => 'Ololo',
    	'name' => 'Arturxx8',
    	'patronymic' => '',
    	'datebirth' => date('Y-m-d H:i:s'),
    	'organization' => '1',
    	'department' => '1',
    	'position' => '0',
    	'address' => 'local',
    	'telephone' => '+7(911)111-11-11',
    	'login' => 'artx',
    	'password' => Hash::make('1'),
    	'url_pic' => '1.jpg'
));
		// $this->call('UserTableSeeder');
	}

}
