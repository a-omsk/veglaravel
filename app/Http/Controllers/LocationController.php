<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Location;
use App\Marker;
use Request;

class LocationController extends Controller
{

    public function index($city)
    {
        return Marker::where('city', '=', $city)->first()->locations()->get();
        return Marker::getMarkersWithLocations($city);
    }

    public function all()
    {
        return Location::all();
    }

    public function show($city, $id)
    {
        return collect(Location::getLocationsByCity($city))->where('id', (int)$id)->values();
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {

        $input = Request::all();

        Location::create($input);

        return $input;
    }

    public function update($city, $id)
    {

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
