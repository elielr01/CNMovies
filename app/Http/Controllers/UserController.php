<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = auth()->user();

        if ($user->isCustomer()) {
            return redirect('/customer/home');
        }

        if ($user->isAdmin()) {
            return redirect('/admin/home');
        }
    }


}
