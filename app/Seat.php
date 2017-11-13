<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seat_id',
        'screen_id',
        'number'
    ];

    protected $primaryKey = 'seat_id';
    public $timestamps = false;

    public function cinema() {
        return $this->belongsTo('App\Screen', 'screen_id', 'screen_id');
    }


    public function cinema_functions(){
        return $this->hasMany('App\Ticket', 'seat_id', 'seat_id');
    }
}
