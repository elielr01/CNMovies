<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',
        'movie_category_id',
        'name',
        'duration',
        'directors',
        'stars',
        'img_name',
        'trailer_url',
        'storyline',
        'is_premiere'
    ];

    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    public function movieCategory() {
        return $this->belongsTo('App\Movie_Category', 'movie_category_id', 'movie_category_id');
    }

    public function cinemaFunctions(){
        return $this->hasMany('App\Cinema_Function', 'movie_id', 'movie_id');
    }
}
