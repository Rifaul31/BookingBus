<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function index()
    {
        $bus = Bus::get();
        return view('bus.index', ['list' => $bus]);
    }

    public function create()
    {
        return view('bus.form', [
            'title' => 'Add',
            'method' => 'POST',
            'action' => 'bus'
        ]);
    }

    public function store(Request $request)
    {
        $bus = new Bus;
        $bus->code = $request->code;
        $bus->name = $request->name;
        $bus->depart_location = $request->depart_location;
        $bus->arrive_location = $request->arrive_location;
        $bus->travel_date = $request->travel_date;
        $bus->departure_time = $request->departure_time;
        $bus->arrival_time = $request->arrival_time;
        $bus->price = $request->price;
        $bus->seats = $request->seats;
        $bus->available_seats = $bus->seats;
        $bus->save();
        return redirect('/bus')->with('msg', 'Bus Add Success');
    }

    public function show($code)
    {
        return Bus::find($code);
    }

    public function edit($code)
    {
        return view('bus.form', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "bus/$code",
            'data' => Bus::find($code)
        ]);
    }

    public function update(Request $request, $code)
    {
        $bus = Bus::find($code);
        $bus->code = $request->code;
        $bus->name = $request->name;
        $bus->depart_location = $request->depart_location;
        $bus->arrive_location = $request->arrive_location;
        $bus->travel_date = $request->travel_date;
        $bus->departure_time = $request->departure_time;
        $bus->arrival_time = $request->arrival_time;
        $bus->price = $request->price;
        $bus->seats = $request->seats;
        $bus->available_seats = $bus->seats;
        $bus->save();
        return redirect('/bus')->with('msg', 'Bus Edit Success');
    }

    public function destroy($code)
    {
        $bus = Bus::findOrFail($code);
        $bus->delete();

        if ($bus){
            return redirect()->route('bus.index')->with('msg', 'Delete Successful');
        } else {
            return redirect()->route('bus.index')->with('msg', 'An Error Occured');
        }
    }
}
