<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		DB::table('group')->insert([
            'label' => 'administrators'
        ]);

		DB::table('users')->insert([
            'name' => 'Мудраков А.В.',
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'group_id' => 1
        ]);
	}

}



