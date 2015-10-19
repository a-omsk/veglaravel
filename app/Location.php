<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = [
        'coordinates',
        'name',
        'type',
        'time',
        'rating',
        'specification',
        'description',
        'price',
        'address',
        'city',
        'created_by',
        'voters'
    ];

    public static function getLocationsByCity($city) {
        $locations = collect(Location::where('city', $city)
            ->groupBy('coordinates')
            ->orderBy('id')
            ->get());

        $response = $locations->map(function ($location, $key) {
            return [
                'id' => $location->id,
                'coordinates' => $location->coordinates,
                'city' => $location->city,
                'locations' => []
            ];
        })->toArray();

        foreach ($response as &$location){
            $array = Location::where('city', $city)
                ->get()
                ->where('coordinates', $location['coordinates'])
                ->values();


            $location['locations'] = $array;
        }
        return $response;
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    /**
     * @param $id
     * @param $value
     * @return float
     */
    public static function countComments($id)
    {
        $comments = \App\Comments::where('id_location', '=', $id);

        $location = Location::find($id);

        $avgRating = ceil($comments->avg('rating')/0.5)*0.5;

        $voters = $comments->count();

        $location->rating = $avgRating;

        $location->voters = $voters;

        $location->save();

        return $avgRating;
    }

}
