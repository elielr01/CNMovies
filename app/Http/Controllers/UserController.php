<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;

class UserController extends Controller
{
    public function __construct() {
        //$this->middleware('auth');
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

    public function showSignUpForm() {
        return view('pages.signup');
    }

    public function signUp(Request $request) {

        // We create the user part first
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username_signup;
        $user->password = bcrypt($request->password_signup);
        $user->type = "Customer";
        $user->save();

        // Then we create the customer part
        $customer = new Customer();
        $customer->customer_id = $user->id;
        $customer->type = 1; //Type 1 is the normal customer type
        $customer->is_banned = 0;
        $customer->save();

        return redirect('/');
    }
}
