<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\IndexEventRequest;
use App\Http\Requests\StoreEventsRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexEventRequest $request)
    {
        $events = Event::all();
        return view('events.index', ['title' => 'Events', 'events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateEventRequest $request)
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        $data = $request->all();
        $data['banner_image'] = $request->file('banner_image')->store('images', 'public');

        Event::create($data);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        dd($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyEventRequest $request, string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function getParticipant(Event $event) {}
}
