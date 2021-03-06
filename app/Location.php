<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Location extends Model
{

    protected $fillable = [
        //'coordinates',
        'marker_id',
        'name',
        'type',
        'time',
        'rating',
        'specification',
        'description',
        'price',
        'address',
        'created_by',
        'voters'
    ];

    public function marker() {
        return $this->belongsTo('App\Marker', 'marker_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comments');
    }

    public static function createNew($input)
    {
        return Location::create($input);
    }

    public static function countComments($id)
    {
        $comments = \App\Comment::where('id_location', '=', $id);
        
        $location = Location::find($id);

        $location->rating = ceil($comments->avg('rating')/0.5)*0.5;

        $location->voters = $comments->count();

        $location->save();

        return $avgRating;
    }

}
