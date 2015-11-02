<?php

use Illuminate\Database\Seeder;

use Cellar\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
			'id'          => 1,
			'name'        => 'Cellar',
			'email'       => 'system@cellar',
			'password'    => bcrypt('password')
        ]);

        User::create([
			'name'        => 'User',
			'email'       => 'user@cellar',
			'password'    => bcrypt('password'),
			'ct_username' => env('CT_USERNAME'),
			'ct_password' => env('CT_PASSWORD'),
        ]);

    }
}
