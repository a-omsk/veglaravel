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
        //'city',
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


    /**
     * @param $id
     * @param $value
     * @return float
     */
    public static function countComments($id)
    {
        $comments = \App\Comments::where('id_location', '=', $id);

        $location = Location::find($id);

        $avgRating = ceil($comments->avg('rating')/0.5)*0.5;

        $voters = $comments->count();

        $location->rating = $avgRating;

        $location->voters = $voters;

        $location->save();

        return $avgRating;
    }

}
