<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = [
        'location_id',
        'user_id',
        'rating',
        'body'
    ];

    public function user()
  	{
    	return $this->belongsTo('App\User');
  	}

	public function location()
	{
		return $this->belongsTo('App\Location');
	}
}
