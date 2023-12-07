<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Travel;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();

        return view('reportReserve', [
            'tickets' => $tickets,
        ]);
    }

    public function searchToDate(Request $request)
    {
        $messages = makeMessages();
        $this->validate($request, [
            'date1' => ['required','date'],
            'date2' => ['required','date'],
        ], $messages);


        $startDate = $request->date1;
        $endDate = $request->date2;

        if ($startDate > $endDate) {
            return back()->with('message', 'La fecha de inicio a consultar no puede ser mayor que la fecha de término de la consulta.');
        }

        $tickets = Ticket::whereBetween('date', [$startDate, $endDate])->get();

        if ($tickets->isEmpty()) {
            return back()->with('message', 'No se encontraron reservas dentro del rango seleccionado.');
        }

        return view('reportReserve', [
            'tickets' => $tickets,
        ]);
    }

}
