<?php

namespace App\Http\Controllers;

use App\Seat;
use App\Ticket;
use Illuminate\Http\Request;
use App\Cinema_Function;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function showSeats(Request $request){

        if (Auth::guest())
            return redirect('/signup');

        $cinema_function_id = $request->id;

        $cinema_func = Cinema_Function::find($cinema_function_id);

        if ($cinema_func) {

            $movie = $cinema_func->movie;
            $screen = $cinema_func->screen;
            $cinema = $screen->cinema;
            $tickets = $cinema_func->tickets;

            $busy_seats = [];
            foreach ($tickets as $ticket) {
                $busy_seats[] = $ticket->seat->number;
            }


            return view('pages.user.chooseSeat')->with([
                'cinema_func' => $cinema_func,
                'movie' => $movie,
                'screen' => $screen,
                'cinema' => $cinema,
                'tickets' => $tickets,
                'busy_seats' => $busy_seats
            ]);
        }
        else {
            return redirect('/')->with('fail', 'Error.');
        }
    }

    public function showCheckout(Request $request){

        if (Auth::guest())
            return redirect('/signup');

        $cinema_func_id = $request->id;
        $seats = $request->seats;

        $cinema_func = Cinema_Function::find($cinema_func_id);

        if ($cinema_func) {

            $movie = $cinema_func->movie;
            $screen = $cinema_func->screen;
            $cinema = $screen->cinema;

            return view('pages.user.checkout')->with([
                'cinema_func' => $cinema_func,
                'movie' => $movie,
                'screen' => $screen,
                'cinema' => $cinema,
                'seats' => $seats
            ]);
        }
        else {
            return redirect('/')->with('fail', 'Error.');
        }
    }
}
