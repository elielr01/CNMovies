<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect('/admin/');
        }
    }

    public function showSignUpForm() {
        if (Auth::check())
            return redirect('/');
        return view('pages.signup');
    }

    public function signUp(Request $request) {

        $password = $request->password_signup;
        $confirm_password = $request->confirm_password;

        $uppercase = preg_match('@[A-ZÑ]@', $password);
        $lowercase = preg_match('@[a-zñ]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $special_char = preg_match('@[_.,!#$%]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$special_char || strlen($password) < 8) {
            // The new password doesn't respect the format
            return redirect()->back()->withInput()->with('fail',
                "Error. The password doesn't respect the format");
        }

        if (strcmp($password, $confirm_password) != 0) {
            // Passwords are not the same
            return redirect()->back()->withInput()->with('fail',
                "Error. Passwords don't match. They should be the same");
        }

        //We need to validate a duplicate entry
        if(User::where('username', $request->username_signup)->first() ||
            User::where('email', $request->email)->first()) {
            return redirect()->back()->withInput()->with('fail',
                "Error. This username or email already exists. Try again");
        }



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

        // Finally we do login
        Auth::login($user);

        //return redirect()->back()->with('success', "Congrats! You're now a user!");
    }

    public function showUserInfo(){
        $user = Auth::user();

        if ($user)
            return view('pages.user.userInfo')->with(['user' => $user]);
        else
            return redirect('/signup');
    }

    public function userInfoForm(){
        $user = Auth::user();

        if ($user)
            return view('pages.user.modifyUserInfo')->with(['user' => $user]);
        else
            return redirect('/signup');
    }

    public function changePasswordForm(){
        $user = Auth::user();

        if ($user)
            return view('pages.user.changePassword')->with(['user' => $user]);
        else
            return redirect('/signup');
    }

    public function modifyUserInfo(Request $request){
        $user = Auth::user();

        if ($user) {

            $new_firstname = $request->firstname;
            $new_lastname = $request->lastname;
            $new_username = $request->username;
            $new_email = $request->email;

            if ($user->firstname == $new_firstname && $user->lastname == $new_lastname &&
                $user->username == $new_username && $user->email == $new_email) {
                return redirect('/userInfo');
            }


            //first, we validate a duplicated username
            if(User::where('username', $new_username)->where('id', '!=', $user->id)->first()) {
                return redirect()->back()->withInput()->with('fail',
                    "Error. This username already exists. Try again");
            }

            if(User::where('email', $new_email)->where('id', '!=', $user->id)->first()) {
                return redirect()->back()->withInput()->with('fail',
                    "Error. This email already exists. Try again");
            }

            //Otherwise, we modify user's info
            $user->firstname = $new_firstname;
            $user->lastname = $new_lastname;
            $user->username = $new_username;
            $user->email = $new_email;
            $user->save();

            return redirect('/userInfo')->with('success', 'User info has been changed successfully');
        }
        else {
            return redirect('/signup');
        }
    }

    public function changePassword(Request $request){
        $user = Auth::user();

        if ($user) {

            $old_password = $request->old_password;
            $new_password = $request->new_password;
            $confirm_new_password = $request->confirm_new_password;

            // first, we check if the old password is the correct one
            if (!Hash::check($old_password, $user->password))
                return redirect()->back()->with('fail',
                    "Error. The old password doesn't match with the current password");

            // if they match, we proceed to password validations
            $uppercase = preg_match('@[A-ZÑ]@', $new_password);
            $lowercase = preg_match('@[a-zñ]@', $new_password);
            $number    = preg_match('@[0-9]@', $new_password);
            $special_char = preg_match('@[_.,!#$%]@', $new_password);

            if(!$uppercase || !$lowercase || !$number || !$special_char || strlen($new_password) < 8) {
                // The new password doesn't respect the format
                return redirect()->back()->with('fail',
                    "Error. The new password doesn't respect the format");
            }

            if (strcmp($new_password, $confirm_new_password) != 0) {
                // Passwords are not the same
                return redirect()->back()->with('fail',
                    "Error. New passwords don't match. They should be the same");
            }

            // If all validations passed, we proceed to modify user's password
            $user->password = bcrypt($new_password);
            $user->save();

            return redirect('/userInfo')->with('success', "Password changed successfully");
        }
        else
            return redirect('/signup');
    }

    public function showMyTickets(){

        if (Auth::guest())
            return redirect('/signup');

        $user = Auth::user();
        $tickets = $user->tickets;

        return view('pages.user.myTickets')->with(['user' => $user, 'tickets' => $tickets]);
    }
}
