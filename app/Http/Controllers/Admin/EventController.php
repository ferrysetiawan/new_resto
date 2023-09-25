<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        Event::create([
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->nama_event),
            'background' => parse_url($request->background)['path'],
            'thumbnail' => parse_url($request->thumbnail)['path'],
            'tanggal' => $request->tanggal,
            'nama_penyelenggara' => $request->nama_penyelenggara,
            'summary' => $request->summary,
            'detail_event' => $request->detail_event
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'nama_event' => $request->nama_event,
            'slug' => Str::slug($request->nama_event),
            'background' => parse_url($request->background)['path'],
            'thumbnail' => parse_url($request->thumbnail)['path'],
            'tanggal' => $request->tanggal,
            'nama_penyelenggara' => $request->nama_penyelenggara,
            'summary' => $request->summary,
            'detail_event' => $request->detail_event
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        if($event){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
