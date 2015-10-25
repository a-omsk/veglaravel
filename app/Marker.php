<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Marker extends Model
{

    protected $fillable = [
        'coordinates',
        'city'
    ];

    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    public static function getMarkersByCity ($city)
    {
        return $markers = Marker::where('city', '=', $city)->get();
    }

    public static function getMarkersWithLocationsByCity ($city)
    {
        return $markers = Marker::with('locations')->where('city', '=', $city)->get();
    }

    public static function createNew($input)
    {
        $markerData = [
            'city'=> $input['city'],
            'coordinates'=> $input['coordinates'],
        ];

        return Marker::create($markerData);
    }
}
