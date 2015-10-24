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

    public $test = 0;

    public static function getMarkersWithLocations ($city){
        $markers =
             Marker::where('city', '=', $city)->first();//->toArray();

        return $markers->locations()->get();//->locations()->get()->toArray();
        return array_map(function($marker){
            //return $marker;
            return [
                'id' => $marker['id'],
                'city' => $marker['city'],
                'coordinates' => $marker['coordinates'],
                'locations' => 0
            ];
        }, $markers);
    }
}
