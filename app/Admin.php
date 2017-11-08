<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'admin_id',
        'added_by'
    ];

    protected $primaryKey = 'admin_id';

    public $incrementing = false;

    public function user() {
        return $this->belongsTo('App\User', 'admin_id');
    }

    public function adminsAdded() {
        return $this->hasMany('App\Admin','added_by', 'admin_id');
    }

    public function addedBy() {
        return $this->belongsTo('App\Admin', 'added_by', 'admin_id');
    }

    public function bannedCustomers(){
        return $this->hasMany('App\Customer', 'banned_by', 'admin_id');
    }

    public $timestamps = false;
}
