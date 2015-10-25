<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Location;
use App\Marker;
use Request;

class LocationController extends Controller
{

    public function index($city)
    {
        return Marker::getMarkersWithLocationsByCity($city);
    }

    public function all()
    {
        return Location::all();
    }

    public function show($city, $id)
    {
        return Marker::getMarkersWithLocationsByCity($city)->where('id', (int)$id);
    }

    public function store()
    {    /* TODO: Complete this method */
        
        if (!Request::input('marker_id')) {
            $newMarker = Marker::createNew(Request::all());
        } else {
            return Location::createNew(Request::all());
        }

    }

    public function update($city, $id)
    {
         /* TODO: Rewrite this method */
        $location = Location::find($id);

        $location->name = Request::input('name');
        $location->type = Request::input('type');
        $location->time = Request::input('time');
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
