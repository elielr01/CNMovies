<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'type',
        'is_banned',
        'banned_by'
    ];

    protected $primaryKey = 'customer_id';

    public $incrementing = false;

    public function user() {
        return $this->belongsTo('App\User', 'customer_id');
    }

    public function customerType() {
        return $this->belongsTo('App\Customer_Type', 'type', 'customer_type_id');
    }

    public function bannedBy() {
        return $this->belongsTo('App\Admin', 'banned_by', 'admin_id');
    }

    public $timestamps = false;
}
