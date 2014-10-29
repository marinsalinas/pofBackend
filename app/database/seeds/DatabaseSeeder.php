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
        /*Address::create(array('user_id'=>1, 'label'=>'CAJE', 'description'=>'La CAJE donde ya no podemos ir :(',
            'textaddress'=>'Arquitectos 129, Tecnológico, Monterrey N.L', 'locarion' => array('lat'=>'25.648058817442973', 'lng'=>'-100.29443085193634')
        ));*/

        $address = new Address();
        $address->user_id = 1;
        $address->label = "CAJE";
        $address->description = "Es la caje del tec";
        $address->textaddress = "Arquitectos 129, Tecnológico, Monterrey N.L";
        $address->location = array('lat'=>'25.648058817442973', 'lng'=>'-100.29443085193634');
        $address->save();
    }

}
