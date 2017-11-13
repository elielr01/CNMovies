<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->type == "Admin";
    }

    public function isCustomer(){
        return $this->type == "Customer";
    }

    public function userChild()
    {
        if ($this->type == 'Admin') {

            return $this->hasOne('App\Admin', 'admin_id', 'id');
        }

        if ($this->type == 'Customer') {
            // exactly the same as the admin's one, the 3th argument is the default one
            return $this->hasOne('App\Customer', 'customer_id');
        }

        return false;
    }

    public function tickets(){
        return $this->hasMany('App\Ticket', 'user_id', 'id');
    }
}
