<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Cinema;
use App\Screen;
use App\Cinema_Function;

class CinemaController extends Controller
{
    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request) {

        $cinema_name = $request->name;

        $cinema = Cinema::where('name', $cinema_name)->first();

        $screens = $cinema->screens;

        $cinema_funcs = [];

        foreach($screens as $screen) {
            foreach($screen->cinema_functions as $cinema_func){
                $cinema_funcs[] = $cinema_func;
            }
        }

        $movies = [];

        foreach ($cinema_funcs as $cinema_func){
            if (!in_array($cinema_func->movie, $movies) && $cinema_func->movie != null ){
                $movies[] = $cinema_func->movie;
            }
        }


        return view('pages.cinema')
            ->with(['cinema' => $cinema, 'cinema_funcs' => $cinema_funcs, 'movies' => $movies]);
    }
}
