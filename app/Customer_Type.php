<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_type_id',
        'name'
    ];

    protected $primaryKey = 'customer_type_id';

    public $incrementing = true;

    public function customers() {
        return $this->hasMany('App\Customer', 'type', 'customer_type_id');
    }

    public $timestamps = false;
}
