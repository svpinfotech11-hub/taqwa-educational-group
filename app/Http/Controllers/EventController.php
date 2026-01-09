<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(){
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
             'desc' => 'nullable',
             'event_date' => 'nullable',
             'image' => 'nullable'
        ]);

        $record = new Event();
        $record->name = $request->name;
        $record->desc = $request->desc;
        $record->event_date = $request->event_date;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imgName = time(). " - " .$image->getClientOriginalName();
            $image->move('events', $imgName);
            $record['image'] = $imgName;
        }

        $record->save();
        return redirect()->route('events.index')->with('success', 'Event Added SuccessFully!');
    }

    public function edit($id){
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    public function destroy($id){
        $record = Event::find($id);
        $record->delete();
        return back()->with('sucess', 'Event Deleted SucessFully!');
    }
}
