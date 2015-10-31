<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Location;
use App\Marker;
use Request;

class LocationController extends Controller
{

    public function all()
    {
        return Location::getAllLocations();
    }

    public function getMarkers($city)
    {
        return Marker::getMarkersByCity($city);
    }

    public function getLocations($city)
    {
        return Location::getLocationsByCity($city);
    }

    public function getSpecLocation($city, $id)
    {
        return Marker::getMarkerWithFullInfo($city, (int)$id);
    }

    public function store()
    {
        if (!Request::input('marker_id')) {

            $newMarker = Marker::createNew(Request::all());

            Request::merge(['marker_id' => (int) $newMarker->id]);

            return Location::createNew(Request::except('city', 'coordinates'));
        }

        return Location::createNew(Request::all());
    }

    public function update($city, $id)
    {
        $location = Location::find($id);

        $location->name = Request::input('name');
        $location->type = Request::input('type');
        $location->business_time = Request::input('business_time');
        $location->specification = Request::input('specification');
        $location->description = Request::input('description');
        $location->price = Request::input('price');
        $location->address = Request::input('address');
        $location->save();

        return $location;
    }

    public function delete($city, $id)
    {
        Location::destroy($id);
        
        return 'Location deleted';
    }
}
