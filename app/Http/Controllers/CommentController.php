<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use Request;

class CommentController extends Controller {

    public function index() {
        $comments = \App\Comment::all();
        return $comments;
    }

    public function show($city, $id) {
                $comments = \App\Comment::where('id_location', '=', $id)
                    ->get();
                return $comments;
    }

    public function store() {

        $input = Request::all();

        $id = Request::input('id_location');
        $rating = Request::input('rating');

        Comment::create($input);

        Location::countComments($id);

        return $input;
    }

}
