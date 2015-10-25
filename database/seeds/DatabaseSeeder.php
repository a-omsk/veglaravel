<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Marker;
use App\Comment;


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
		$this->call('CommentsTableSeeder');
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

class CommentsTableSeeder extends Seeder {

    public function run()
    {
		$numberOfComments = 150;
		$locations = Location::all();

		DB::table('comments')->delete();

		for ($i = 1; $i <= $numberOfComments; $i++) {
        	Comment::create([
				'user_id' => 1,
				'location_id' => $locations->shuffle()->first()->id,
				'body' => 'Quibusdam illum, nibh justo orci leo perferendis alias ' .
				'aliquid. Earum quia. Nunc! Assumenda placeat excepturi! Inceptos congue!',
				'rating' => mt_rand(1, 5)
			]);
		}
	}
}
