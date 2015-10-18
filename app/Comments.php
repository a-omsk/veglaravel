<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	protected $fillable = [
        'id_location',
        'author',
        'rating',
        'body'
    ];

    public function user()
  	{
    	return $this->belongsTo('User');
  	}

  	public function product()
  	{
    	return $this->belongsTo('App\Location');
  	}

}
