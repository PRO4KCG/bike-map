<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations') -> insert([
            'locationName' => '京都コンピュータ学院京都駅前校',
            'latitude' => 34.985041,
            'longitude' => 135.752556,
        ]);

        DB::table('locations') -> insert([
            'locationName' => '阪神甲子園球場',
            'latitude' => 34.721217,
            'longitude' => 135.361656,
        ]);
    }

    
}
