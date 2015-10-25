<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Marker;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
		DB::table('markers')->delete();
		DB::table('locations')->delete();

        Marker::create([
			'id' => 1, // kek
			'coordinates' => "54.9769240537932, 73.39931488037111",
			'city' => 'omsk'
		]);

		Marker::create( [
			'id' => 2,
			'coordinates' => "54.975076807307914, 73.38135480880739",
			'city' => 'omsk'
		]);

		Location::create([
			'marker_id' => 1,
			'name' =>"testetst",
			'address' => 'f',
			'time' => '12',
			'type' => "restaurant",
			'description' => 'ff',
			'price' => '5',
			'specification' => "vegetarian",
			'rating' => 2
			]);

		Location::create([
			'marker_id' => 1,
			'name' =>"edsve4wf",
			'address' => 'f',
			'time' => '45',
			'type' => "cafe",
			'description' => 'ff',
			'price' => '5',
			'specification' => "vegetarian",
			'rating' => 4
			]);

		Location::create([
			'marker_id' => 2,
			'name' =>"dgsg",
			'time' => '34',
			'address' => 'f',
			'type' => "coffee",
			'description' => 'ff',
			'price' => '5',
			'specification' => "vegan",
			'rating' => 5
			]);

		Location::create([
			'marker_id' => 2,
			'address' => 'f',
			'name' =>"gmmgmm",
			'time' => '12',
			'type' => "restaurant",
			'price' => '5',
			'description' => 'ff',
			'specification' => "vegetarian",
			'rating' => 1
			]);

		Location::create([
			'marker_id' => 2,
			'address' => 'f',
			'name' =>"345344fr",
			'time' => '12',
			'type' => "restaurant",
			'price' => '5',
			'description' => 'ff',
			'specification' => "vegetarian",
			'rating' => 4
			]);
    }
}
