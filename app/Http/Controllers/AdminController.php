<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return redirect('/');
    }

    public function home() {

        if (Auth::guest())
            return redirect('/');

        $user = Auth::user();

        if (!$user->isAdmin())
            return redirect('/');
        else
            return view('pages.admin.home');
    }
}
