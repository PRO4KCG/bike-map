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

		DB::table('locations')->insert([
			'locationName' => '登録待ち',
			'latitude' => 34.352506,
			'longitude' => 145.173339,
		]);

		DB::table('locations')->insert([
			'locationName' => '京都コンピュータ学院京都駅前校',
			'latitude' => 34.985041,
			'longitude' => 135.752556,
		]);

		DB::table('locations')->insert([
			'locationName' => '阪神甲子園球場',
			'latitude' => 34.721217,
			'longitude' => 135.361656,
		]);

		DB::table('locations')->insert([
			'locationName' => '京都コンピュータ学院鴨川校',
			'latitude' => 35.027876,
			'longitude' => 135.772926,
		]);

		DB::table('locations')->insert([
			'locationName' => '京都コンピュータ学院洛北校',
			'latitude' => 35.044426,
			'longitude' => 135.772223,
		]);



		DB::table('locations')->insert([
			'locationName' => '旭山・雪の村',
			'latitude' => 43.767938,
			'longitude' => 142.484065,
		]);







		DB::table('locations')->insert([
			'locationName' => '阿蘇山',
			'latitude' => 32.898506,
			'longitude' => 131.087475,
		]);



		DB::table('locations')->insert([
			'locationName' => '桜島',
			'latitude' => 31.583333,
			'longitude' => 130.65,
		]);



		DB::table('locations')->insert([
			'locationName' => '西瀬戸自動車道',
			'latitude' => 34.260367,
			'longitude' => 133.088115,
		]);



		DB::table('locations')->insert([
			'locationName' => '瓶ヶ森林道',
			'latitude' => 33.784698,
			'longitude' => 133.269326,
		]);



		DB::table('locations')->insert([
			'locationName' => '稲佐の浜',
			'latitude' => 35.401932,
			'longitude' => 132.670956,
		]);



		DB::table('locations')->insert([
			'locationName' => '秋吉台',
			'latitude' => 34.234894,
			'longitude' => 131.305865,
		]);



		DB::table('locations')->insert([
			'locationName' => '魚沼スカイライン',
			'latitude' => 37.038381,
			'longitude' => 138.797183,
		]);



		DB::table('locations')->insert([
			'locationName' => '千里浜なぎさドライブウェイ',
			'latitude' => 36.86619,
			'longitude' => 136.758309,
		]);



		DB::table('locations')->insert([
			'locationName' => '竜神大吊り橋',
			'latitude' => 36.682853,
			'longitude' => 140.46617,
		]);



		DB::table('locations')->insert([
			'locationName' => '武生林道',
			'latitude' => 36.715716,
			'longitude' => 140.446285,
		]);



		DB::table('locations')->insert([
			'locationName' => '龍泊ライン',
			'latitude' => 41.201133,
			'longitude' => 140.340338,
		]);



		DB::table('locations')->insert([
			'locationName' => '津軽岩木山スカイライン',
			'latitude' => 40.640158,
			'longitude' => 140.261623,
		]);



		DB::table('locations')->insert([
			'locationName' => '六甲山',
			'latitude' => 34.778023,
			'longitude' => 135.263724,
		]);
	}
}
