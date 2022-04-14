<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::get();
        return view('ticket.index', ['list' => $ticket]);
    }

    public function create()
    {
        return view('ticket.form', [
            'title' => 'Add',
            'method' => 'POST',
            'action' => 'ticket'
        ]);
    }

    public function store(Request $request)
    {
        $tkt = new Ticket;
        $tkt->code = $request->code;
        $tkt->name = $request->name;
        $tkt->depart_location = $request->depart_location;
        $tkt->arrive_location = $request->arrive_location;
        $tkt->travel_date = $request->travel_date;
        $tkt->departure_time = $request->departure_time;
        $tkt->arrival_time = $request->arrival_time;
        $tkt->price = $request->price;
        $tkt->save();
        return redirect('/ticket')->with('msg', 'Ticket Add Success');
    }

    public function show($code)
    {
        return Ticket::find($code);
    }

    public function edit($code)
    {
        return view('ticket.form', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "ticket/$code",
            'data' => Ticket::find($code)
        ]);
    }

    public function update(Request $request, $code)
    {
        $tkt = Ticket::find($code);
        $tkt->code = $request->code;
        $tkt->name = $request->name;
        $tkt->depart_location = $request->depart_location;
        $tkt->arrive_location = $request->arrive_location;
        $tkt->travel_date = $request->travel_date;
        $tkt->departure_time = $request->departure_time;
        $tkt->arrival_time = $request->arrival_time;
        $tkt->price = $request->price;
        $tkt->save();
        return redirect('/ticket')->with('msg', 'Ticket Edit Success');
    }

    public function destroy($code)
    {
        $tkt = Ticket::findOrFail($code);
        $tkt->delete();

        if ($tkt){
            return redirect()->route('ticket.index')->with('msg', 'Delete Successful');
        } else {
            return redirect()->route('ticket.index')->with('msg', 'An Error Occured');
        }
    }
}
