<?php

namespace App\Http\Controllers\AdminControllers;


use App\Event;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.event.index',compact('events'));
    }

    public function create()
    {
        $tags=Tag::all();
        return view('admin.event.add',compact('tags'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate(Event::$save_rules);
        return(Event::saveEvent($request->all(), null));
    }

    public function edit($id)
    {
        $tags=Tag::all();
        $event = Event::where('id',$id)->first();
        return view('admin.event.edit',compact('event','tags'));

    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(Event::$update_rules);
        return(Event::saveEvent($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $event = Event::where('id',$id)->first();
        if ($event) {
            $event->delete();
            toastr( 'Successful Delete',  'danger',  'Event');
            return redirect('admin/event');

        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/event');

    }
}
