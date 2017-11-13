<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_id',
        'name',
        'address',
        'telephone',
        'email',
        'info'
    ];

    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    public function screens() {
        return $this->hasMany('App\Screen', 'cinema_id', 'cinema_id');
    }
}
