<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Travel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // Generar el numero de reserva
        $code = generateReservationNumber();

        //Obtener el total base-rate del request
        $baseRateTotal = $request->input('base-rate');
        // Modificar request
        $request->request->add(['code' => $code]);
        $travel = Travel::where('origin', $request->origins)->where('destination', $request->destinations)->first();

        $ticket = Ticket::create([
        'code' => $request->code,
        'seat' => $request->seat,
        'date' => $request->date,
        'total' => $request->base_rate * $request->seat ,
        'travel_id' => $travel->id,
        ]);

        return redirect()->route('generate.pdf', [
            'id' => $ticket->id,
        ]);
    }


}
