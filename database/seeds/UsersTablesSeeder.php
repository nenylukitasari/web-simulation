<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name'				=> 'Admin',
    		'email'				=> 'admin@mail.com',
    		'password'			=> Hash::make('Admin123'),
    		'remember_token'	=> str_random(10),
    	]);

        User::create([
            'name'              => 'Admin-Telkom',
            'email'             => 'admin@telkom.com',
            'password'          => Hash::make('Telkom123'),
            'remember_token'    => str_random(10),
        ]);
        //
    }
}
