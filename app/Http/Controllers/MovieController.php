<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Cinema_Function;
use App\Screen;
use App\Cinema;

class MovieController extends Controller
{
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {

        $movie_id = $request->id;

        $movie = Movie::find($movie_id);

        if ($movie) {

            $screens_ids = Cinema_Function::where('movie_id', $movie_id)->where('is_active', 1)
                ->groupBy('screen_id')->pluck('screen_id');

            $screens = [];
            foreach ($screens_ids as $screen_id) {
                $screens[] = Screen::find($screen_id);
            }

            $cinemas = [];
            foreach ($screens as $screen){
                $cinemas[] = Cinema::find($screen->cinema_id);
            }


            $cinema_funcs = $movie->cinemaFunctions;

            return view('pages.movie')
                ->with(['movie' => $movie, 'cinemas' => $cinemas, 'cinema_funcs' => $cinema_funcs]);
        }
        else {
            return redirect('/');
        }
    }
}
