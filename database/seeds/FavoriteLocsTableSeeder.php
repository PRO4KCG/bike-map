<?php

use Illuminate\Database\Seeder;

class FavoriteLocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('favoriteLocs') -> insert([
            'id' => 1,
            'locationID' => 1,
            'title' => '京都コンピュータ学院京都駅前校いってきた',
            'comment' => 'よかった'
        ]);
    }
}
