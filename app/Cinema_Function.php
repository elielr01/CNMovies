<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema_Function extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_function_id',
        'movie_id',
        'screen_id',
        'duration',
        'starting_hour',
        'is_active'
    ];

    protected $primaryKey = 'cinema_function_id';
    public $timestamps = false;
    public $table = 'cinema_functions';

    public function movie() {
        return $this->belongsTo('App\Movie', 'movie_id', 'movie_id')
            ->where('is_active', 1);
    }

    public function screen(){
        return $this->belongsTo('App\Screen', 'screen_id', 'screen_id');
    }
}
