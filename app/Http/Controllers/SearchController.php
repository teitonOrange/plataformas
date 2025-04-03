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

        if($request->code == "" || $request->code == null){
            return back()->with('msg1','debe proporcionar un código de reserva');
        }

        $ticket = Ticket::where('code', $request->code)->first();
        if (!$ticket){
            return back()->with('msg2','la reserva '.$request->code.' no existe en sistema');
        } else {
            $voucher = Voucher::where('ticket_id', $ticket->id)->first();
            return view('order_success', [
                'ticket' => $ticket,
                'voucher' => $voucher,
            ]);
        }
    }

}
