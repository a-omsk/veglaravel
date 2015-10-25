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

		$this->call('LocationsAndMarkersTableSeeder');
	}

}

class LocationsAndMarkersTableSeeder extends Seeder {

    public function run()
    {

		$numberOfMarkers = 20;
		$numberOfLocations = 40;

		DB::table('markers')->delete();
		DB::table('locations')->delete();

		for ($i = 1; $i <= $numberOfMarkers; $i++) {

        	Marker::create([
				'id' => $i,
				'coordinates' => "54.97" . mt_rand(1, 69240537932) . ", " . 73.39 . mt_rand(1, 931488037111),
				'city' => 'omsk'
			]);
		}

		for ($i = 1; $i <= $numberOfLocations; $i++) {
			Location::create([
				'marker_id' => mt_rand(1, $numberOfMarkers),
				'user_id' => 1,
				'name' =>"Test Location №" . $i,
				'address' => 'Test address',
				'business_time' => '24/7',
				'type' => "coffee",
				'description' => 'Tortor architecto ornare blandit consectetur venenatis accumsan bibendum',
				'price' => 'above average',
				'specification' => "vegetarian",
				'rating' => mt_rand(1, 5)
				]);
		}

    }
}
