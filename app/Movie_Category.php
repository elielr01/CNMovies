<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_category_id',
        'name',
        'description'
    ];

    protected $primaryKey = 'movie_category_id';
    public $timestamps = false;

    public function movies() {
        return $this->hasMany('App\Movie', 'movie_category_id', 'movie_category_id');
    }


}
