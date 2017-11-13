<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_id',
        'cinema_id',
        'number'
    ];

    protected $primaryKey = 'screen_id';
    public $timestamps = false;

    public function cinema() {
        return $this->belongsTo('App\Cinema', 'cinema_id', 'cinema_id');
    }

    public function cinema_functions(){
        return $this->hasMany('App\Cinema_Function', 'screen_id', 'screen_id')
            ->where('is_active', 1);
    }
}
