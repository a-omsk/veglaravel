<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use Request;

class LocationController extends Controller {

    public function index($city) {
      return Location::where('city', $city)
        ->get();
    }

    public function show($city, $id) {
      return Location::where('city', $city)->where('id', $id)
        ->get();
    }

    public function create() {
        return view('create');
    }

    public function store() {

        $input = Request::all();

        Location::create($input);

        return $input;
    }

    public function get() {
        $coordinates = Location::lists('coordinates');
        return $coordinates;
    }
}
