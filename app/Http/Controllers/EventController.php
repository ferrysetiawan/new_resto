<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->countEvent = Event::where('tanggal', '>=', Carbon::now())->count();
        $this->countNews  = Post::count();
        $this->recentPost = Post::publish()->latest()->take(10)->get();
    }

    public function detail($slug)
    {
        $countEvent = $this->countEvent;
        $countNews  = $this->countNews;
        $event = Event::where('slug', $slug)->first();
        return view('event.detail',[
            'event' => $event,
            'countEvent' => $countEvent,
            'countNews' => $countNews,
        ]);
    }
}
