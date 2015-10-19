<?php namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use Request;

class CommentsController extends Controller {

    public function index() {
        $comments = \App\Comments::all();
        return $comments;
    }

    public function show($city, $id) {
                $comments = \App\Comments::where('id_location', '=', $id)
                    ->get();
                return $comments;
    }

    public function store() {

        $input = Request::all();

        $id = Request::input('id_location');
        $rating = Request::input('rating');

        Comments::create($input);

        Location::countComments($id);

        return $input;
    }

}
