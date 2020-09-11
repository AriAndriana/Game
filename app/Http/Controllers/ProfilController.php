<?php

namespace App\Http\Controllers;

use App\Profil;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::with('user')->get();
        return view('profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profil = Profil::all();
        $user = User::all();
        return view('profil.create', compact('profil', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profil = new Profil;
        $profil->nama = $request->nama;
        $profil->ttl = $request->ttl;
        $profil->alamat = $request->alamat;
        $profil->user_id = $request->user_id;
        $profil->save();
        return redirect()->route('profil.index')->with(['message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profil.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        $user = User::all();
        return view('profil.edit', compact('profil', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);
        $profil->nama = $request->nama;
        $profil->ttl = $request->ttl;
        $profil->alamat = $request->alamat;
        $profil->user_id = $request->user_id;
        $profil->save();
        return redirect()->route('profil.index')->with(['message' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();
        return redirect()->route('profil.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
