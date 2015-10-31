<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use \DB;

class Location extends Model
{

    protected $fillable = [
        'marker_id',
        'user_id',
        'name',
        'type',
        'business_time',
        'rating',
        'specification',
        'description',
        'price',
        'address',
        'voters'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function marker() {
        return $this->belongsTo('App\Marker', 'marker_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public static function getAllLocations()
    {
        return Location::paginate(15);
    }

    public static function getLocationsByCity ($city)
    {
        return DB::table('locations')
            ->join('markers', 'locations.marker_id', '=', 'markers.id')
            ->where('city', '=', $city)
            ->select('locations.*')
            ->paginate(15);
    }

    public static function createNew($input)
    {
        return Location::create($input);
    }

    public static function countComments($id)
    {
        $comments = Comment::where('location_id', $id);

        $location = Location::find($id);

        $location->rating = ceil($comments->avg('rating')/0.5)*0.5;

        $location->voters = $comments->count();

        $location->save();

        return $location->rating;
    }

}
