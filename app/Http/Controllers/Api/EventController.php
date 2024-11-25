<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __invoke(Request $request)
    {
//        $events = Event::where('title', 'like', '%' . $request['query'] . '%')
//            ->orWhere('description', 'like', '%' . $request['query'] . '%')
//            ->get();

        $events = Event::search($request['query'])->get()->exactMatch($request['query'], ['title', 'description']);

        return EventResource::collection($events);
    }
}
