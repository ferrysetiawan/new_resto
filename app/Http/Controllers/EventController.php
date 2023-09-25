<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('event.detail',[
            'event' => $event,
        ]);
    }
}
