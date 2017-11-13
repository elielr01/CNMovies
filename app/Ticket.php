<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'user_id',
        'cinema_function_id',
        'seat_id',
        'subtotal',
        'total'
    ];

    protected $primaryKey = 'ticket_id';

    public function cinema_function(){
        return $this->belongsTo('App\Cinema_Function',
            'cinema_function_id', 'cinema_function_id');
    }

    public function seat(){
        return $this->belongsTo('App\Seat', 'seat_id', 'seat_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
