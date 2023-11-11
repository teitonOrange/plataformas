<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Voucher;
use Session;

class SearchController extends Controller
{
    public function index(){
        return view('searchReservation');
    }

    public function store(Request $request){

        $ticket = Ticket::where('code', $request->code)->first();
        if (!$ticket){
            Session::flash('errorBusqueda','No se encontró ninguna reserva con ese código.');
            return;
        } else {
            $voucher = Voucher::where('ticket_id', $ticket->id)->first();
            if(!$voucher){
                Session::flash('errorBusqueda','No se encontró ninguna reserva con ese código.');
                return redirect()->view('searchReservation');
            }
            return view('order_success', [
                'ticket' => $ticket,
                'voucher' => $voucher,
            ]);
        }
    }
}
