<?php

namespace App\Http\Controllers;

use App\Event;
use App\Kategori;
use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::with('kategori')->get();
        return view('event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $genre = Genre::all();
        $user = User::all();
        return view('event.create', compact('kategori', 'genre', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->judul = $request->judul;
        $event->slug = str_slug($request->judul);
        $event->berita = $request->berita;
        $event->kategori_id = $request->kategori_id;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->save();
        return redirect()->route('event.index')->with(['message' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $kategori = Kategori::all();
        return view('event.show', compact('event', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $kategori = Kategori::all();
        $genre = Genre::all();
        return view('event.edit', compact('event', 'kategori','genre'));
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
        $event->judul = $request->judul;
        $event->slug = str_slug($request->judul);
        $event->berita = $request->berita;
        $event->kategori_id = $request->kategori_id;
        $event->genre_id = $request->genre_id;
        $event->user_id = Auth::user()->id;
        $event->save();
        return redirect()->route('event.index')->with(['message' => 'Data Berhasil Diubah']);
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
        return redirect()->route('event.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
