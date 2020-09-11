<?php

namespace App\Http\Controllers;

use App\Info;
use App\Artikel;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Info::with('artikel')->get();
        return view('info.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = Info::all();
        $artikel = Artikel::all();
        return view('info.create', compact('info', 'artikel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new Info;
        $info->versi = $request->versi;
        $info->developer =  $request->developer;
        $info->publisher = $request->publisher;
        $info->artikel_id = $request->artikel_id;
        $info->save();
        return redirect()->route('info.index')->with(['message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::findOrFail($id);
        $artikel = Artikel::all();
        return view('info.show', compact('info', 'artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::findOrFail($id);
        $artikel = Artikel::all();
        return view('info.edit', compact('info', 'artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);
        $info->versi = $request->versi;
        $info->developer =  $request->developer;
        $info->publisher = $request->publisher;
        $info->artikel_id = $request->artikel_id;
        $info->save();
        return redirect()->route('info.index')->with(['message' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        $info->delete();
        return redirect()->route('info.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
