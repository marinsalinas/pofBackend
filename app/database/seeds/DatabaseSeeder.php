<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('AddressSeeder');
        $this->command->info('address table seeded!');


		// $this->call('UserTableSeeder');
	}

}

class AddressSeeder extends Seeder{

    public function run(){
        Address::create(array('user_id'=>1, 'label'=>'Casa Juanki', 'description'=>'Esta es la casa de juanca',
            'textaddress'=>'En la del Valle'
        ));
    }

}
