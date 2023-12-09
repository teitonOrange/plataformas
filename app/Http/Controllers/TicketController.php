<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Travel;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    public function store(Request $request)
    {
        try{
        // Generar el numero de reserva
        $code = generateReservationNumber();

        //Obtener el total base-rate del request
        $baseRateTotal = $request->input('base-rate');
        // Modificar request
        $request->request->add(['code' => $code]);
        $travel = Travel::where('origin', $request->origins)->where('destination', $request->destinations)->first();
        if($travel->seat < $request->seat){
            return redirect()->back()->with('error', 'Ha ocurrido un error en la cantidad de asientos seleccionados, intente nuevamente.');
        }
        if(!$travel){
            return redirect()->back()->with('error', 'Ha ocurrido un error al generar la reserva, intente nuevamente.');
        }
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
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Ha ocurrido un error al generar la reserva, intente nuevamente.');
        }
    }
}
