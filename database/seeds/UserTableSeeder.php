<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' 		=> 'Gabriel Cunha',
        	'email' 	=> 'gabriel.miranda@ce7p.com',
        	'password' 	=> bcrypt('123456')
        ]);
    }
}
