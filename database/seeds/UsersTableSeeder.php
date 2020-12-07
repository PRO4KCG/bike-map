<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'bikeName' => 'CB400SF'
        ]);

        DB::table('users') -> insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin1234'),
            'bikeName' => 'CB400SF'
        ]);


        
    }
}
