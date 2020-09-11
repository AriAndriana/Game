<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\Tag;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::with('kategori', 'tag')->get();
        return view('artikel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $genre = Genre::all();
        return view('artikel.create', compact('kategori', 'tag', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul);
        $artikel->berita = $request->berita;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->genre_id = $request->genre_id;
        $artikel->user_id = Auth::user()->id;
        $artikel->save();
        $artikel->tag()->attach($request->tag);
        return redirect()->route('artikel.index')->with(['message' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        $selected = $artikel->tag->pluck('id')->toArray();
        return view('artikel.show', compact('artikel', 'kategori', 'selected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        $genre = Genre::all();
        $selected = $artikel->tag->pluck('id')->toArray();
        return view('artikel.edit', compact('artikel', 'kategori','genre', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul);
        $artikel->berita = $request->berita;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->genre_id = $request->genre_id;
        $artikel->user_id = Auth::user()->id;
        $artikel->save();
        $artikel->tag()->sync($request->tag);
        return redirect()->route('artikel.index')->with(['message' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->tag()->detach($artikel->tag);
        $artikel->delete();
        return redirect()->route('artikel.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
