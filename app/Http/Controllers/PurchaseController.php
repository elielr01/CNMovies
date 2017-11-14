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

        if (!isset($request->seats))
            return redirect()->back()->with('fail', "You need to choose a seat to proceed");

        $cinema_func_id = $request->id;
        $seats = $request->seats;

        $cinema_func = Cinema_Function::find($cinema_func_id);

        if ($cinema_func) {

            $movie = $cinema_func->movie;
            $screen = $cinema_func->screen;
            $cinema = $screen->cinema;

            $total = 0;

            foreach ($seats as $seat){
                $total += $cinema_func->price;
            }

            return view('pages.user.checkout')->with([
                'cinema_func' => $cinema_func,
                'movie' => $movie,
                'screen' => $screen,
                'cinema' => $cinema,
                'seats' => $seats,
                'total' => $total
            ]);
        }
        else {
            return redirect('/')->with('fail', 'Error.');
        }
    }

    public function buyTicket(Request $request){

        if (Auth::guest())
            return redirect('/signup');

        $user = Auth::user();
        $cinema_func_id = $request->id;
        $seats_numbers = $request->seats;

        $cinema_func = Cinema_Function::find($cinema_func_id);

        if ($cinema_func) {

            $movie = $cinema_func->movie;
            $screen = $cinema_func->screen;
            $cinema = $screen->cinema;

            $seats = Seat::where('screen_id', $screen->screen_id)->whereIn('number', $seats_numbers)->get();

            $total = 0;
            foreach ($seats as $seat){
                $ticket = new Ticket();
                $ticket->user_id = $user->id;
                $ticket->cinema_function_id = $cinema_func->cinema_function_id;
                $ticket->seat_id = $seat->seat_id;
                $ticket->subtotal = $cinema_func->price;
                $ticket->total = $cinema_func->price;
                $ticket->save();

                $total += $ticket->total;
            }

            return view('pages.user.purchased')->with([
                'cinema_func' => $cinema_func,
                'movie' => $movie,
                'screen' => $screen,
                'cinema' => $cinema,
                'seats' => $seats_numbers,
                'total' => $total,
                'success' => "Tickets bought successfully"
            ]);
        }
        else {
            return redirect('/')->with('fail', 'Error.');
        }

    }

}
