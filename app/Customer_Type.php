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
}
