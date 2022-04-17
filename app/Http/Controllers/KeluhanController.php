<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $keluhan = Keluhan::orderBy('user_id','asc')->get();
        return view('layouts.user.index', compact(['keluhan', 'user', 'user_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $keluhan = new Keluhan;
        $keluhan->keluhan = $request->input('keluhan');
        $keluhan->user_id = $user_id;

        /* validasi input */
        $request->validate([
            'keluhan' => ['required']
        ]);

        /* simpan smeua penambahan data */
        $keluhan->save();
        return redirect()->route('users.daftar-keluhan')->with('status', 'Keluhan anda telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Keluhan $keluhan, $id)
    {
        
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $keluhans = Keluhan::find($id);
        return view('layouts.user.detail', compact(['keluhans', 'user', 'user_id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) { 

        $user_id = Auth::user()->id;
        $user = Auth::user();
        $keluhans = Keluhan::find($id);
        $formdata = [
            'keluhan' => ['text', "Deskripsi Keluhan"],
        ];

        return view('layouts.user.edit', compact('keluhans', 'formdata', 'user', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluhan $keluhan, $id)
    {
        $update = [
            'keluhan' => $request->keluhan
        ] ;
        Keluhan::where('id', $id)->update($update);        
        return redirect()->route('users.daftar-keluhan')->with('status', 'Keluhan anda telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluhan $keluhan, $id)
    {
        $keluhans = Keluhan::find($id);
        $keluhans->delete();
        return redirect()->route('users.daftar-keluhan')->with('status', 'Keluhan anda telah dihapus');
    }
}
