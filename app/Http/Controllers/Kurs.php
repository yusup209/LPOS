<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterKurs;

class Kurs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurs = MasterKurs::all();
        return view('pages.kurs.index', compact('kurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kurs = new MasterKurs;
        $kurs->kurs = $request->input('kurs');
        $kurs->save();
        
        return redirect()->route('kurs.index')->with('sukses','berhasil menambah kurs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kurs = MasterKurs::where('id', $id)->get()[0];
        return view('pages.kurs.edit', compact('kurs'));
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
        $kurs = MasterKurs::find($id);
        $kurs->kurs = $request->input('kurs');
        $kurs->save();

        return redirect()->route('kurs.index')->with('sukses','sukses update data kurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterKurs::find($id)->delete();
        return redirect()->route('kurs.index')->with('sukses','sukses hapus kurs');
    }
}
