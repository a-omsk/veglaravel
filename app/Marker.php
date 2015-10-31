<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Marker extends Model
{

    protected $fillable = [
        'coordinates',
        'city'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    public static function getMarkersByCity ($city)
    {
        return Marker::where('city', $city)->get();
    }

    public static function getMarkersWithLocationsByCity ($city)
    {
        return Marker::with('locations')->where('city', $city)->get();
    }

    public static function getMarkerWithFullInfo ($city, $id){
        return Marker::with('locations')
            ->with('locations.comments')
            ->where('city', $city)
            ->where('id', (int) $id)
            ->get();
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
