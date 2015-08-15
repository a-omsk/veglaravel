<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
    
    protected $fillable = [
        'coordinates',
        'name',
        'type',
        'time',
        'rating',
        'specification',
        'description',
        'price',
        'address',
        'city'
    ];

}
