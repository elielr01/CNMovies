<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Cinema_Function;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index(Request $request) {

        $all_premieres = Movie::where('is_premiere', 1)->where('is_active', 1)->pluck('movie_id');
        $all_premiere_functions = Cinema_Function::whereIn('movie_id', $all_premieres)->where('is_active', 1)
            ->groupBy('movie_id')->pluck('movie_id');
        $premieres = Movie::whereIn('movie_id', $all_premiere_functions)->get();

        $all_movies = Movie::where('is_active', 1)->pluck('movie_id');
        $all_movie_functions = Cinema_Function::whereIn('movie_id', $all_movies)->where('is_active', 1)
            ->groupBy('movie_id')->pluck('movie_id');
        $movies = Movie::whereIn('movie_id', $all_movie_functions)->get();

        return view('pages.homepage')->with(['premieres' => $premieres, 'movies' => $movies]);
    }
}
