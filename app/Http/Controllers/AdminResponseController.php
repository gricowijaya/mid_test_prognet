<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AdminResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $keluhan = Keluhan::all();
        Paginator::useBootstrap();
        return view('layouts.admin.index', compact('keluhan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keluhan = Keluhan::find($id);
        $user = User::all();
        return view('layouts.admins.create', compact('keluhan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keluhan = Keluhan::find($id);
        if(!empty($request->reply)){
            $keluhan->save();
        }
        return redirect()->route('admins.daftar-keluhan')->with('status', 'Keluhan anda telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keluhan = Keluhan::find($id);
        $user = User::all();
        return view('layouts.admin.detail', compact('keluhan', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user_id = Auth::user()->id;
        $user = Auth::user();
        $keluhan = Keluhan::find($id);
        $formdata = [
            'reply' => ['text', "Pesan Membalas"],
        ];

        return view('layouts.admin.edit', compact('keluhan', 'formdata', 'user', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'reply' => $request->reply,
            'status' => 'terjawab',
        ];
        Keluhan::where('id', $id)->update($update);        
        // dd($update);
        return redirect()->route('admins.daftar-keluhan')->with('status', 'Anda telah membalas keluhan user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Respon::where('keluhan_id',$id)->delete();
        return redirect()->route('admins.daftar-keluhan')->with('status', 'Keluhan anda telah dihapus');
    }
}
