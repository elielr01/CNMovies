<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index(Request $request) {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin())
                return view('pages.homepage')->with(['user' => $user, 'admin' => $user->userChild]);
            elseif ($user->isCustomer())
                return view('pages.homepage')->with(['user' => $user, 'customer' => $user->userChild]);
            else
                return view('pages.homepage');
        }
        else
            return view('pages.homepage');
    }
}
