<?php

namespace App\Http\Controllers;

use App\EventProductList;
use App\Task;
use App\User;
use Calendar;
use App\Event;
use App\EventCategory;
use App\EventChannel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = [];
        $data = Event::all()->where('end_date', '>', Carbon::now())->sortByDesc('end_date');
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#68a4d8',
                        'url' => route('events.edit', $value->id) // view('admin.events.edit', compact(''))
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        return view('admin.events.index', compact('calendar', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventCategory::pluck('name', 'id')->all();
        $channels = EventChannel::pluck('name', 'id')->all();
        return view('admin.events.create', compact('categories', 'channels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'event_category_id' => $request->event_category_id,
            'event_channel_id' => $request->event_channel_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        );

        Event::create($data);
        Session::flash('created_event', 'The event was created successfully');
        return redirect ('/admin/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $productlist = EventProductList::where('event_id', $id)->pluck('name', 'id');
        $productlists = EventProductList::all()->where('event_id', '==', $id);
        $event = Event::find($id);
        $users = User::where('is_active', 1)->pluck('name', 'id')->all();
        $categories = EventCategory::pluck('name', 'id')->all();
        $channels = EventChannel::pluck('name', 'id')->all();
        $tasks = Task::all()->where('event_id', '==', $id)->sortByDesc('created_at');
        //return $tasks;
        return view('admin.events.edit', compact('event', 'users', 'categories', 'channels', 'productlists', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        Session::flash('updated_event', 'The event was updated successfully');
        return redirect('/admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        Session::flash('deleted_event', 'The event was deleted successfully');
        return redirect('/admin/events');
    }


}
