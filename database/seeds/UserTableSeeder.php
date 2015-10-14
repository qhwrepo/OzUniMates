<?php

use Illuminate\Database\Seeder;
use App\User; // to use Eloquent Model 

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
    	'id'       => '1',
        'name'     => 'Stanley Luo',
        'role'     => 'coun',
        'email'    => 'xuan9230@gmail.com',
        'password' => Hash::make('DWdbl123'),
    ));
}

}