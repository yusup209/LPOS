<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterBahan;
use App\MasterUnit;

class MasterBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = MasterUnit::all();
        $bahan = MasterBahan::all();
        return view('pages.master_bahan.index', compact('bahan','unit'));
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
        $bahan = new MasterBahan();
        $bahan->nama_bahan = $request->input('nama_bahan');
        $bahan->id_unit = $request->input('id_unit');
        $bahan->save();

        return redirect()->route('master_bahan.index');
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
        $unit = MasterUnit::all();
        $bahan = MasterBahan::where('id',$id)->get()[0];
        return view('pages.master_bahan.edit', compact('bahan','unit'));
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
        $bahan = MasterBahan::find($id);
        $bahan->nama_bahan = $request->input('nama_bahan');
        $bahan->id_unit = $request->input('id_unit');
        $bahan->save();

        return redirect()->route('master_bahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterBahan::find($id)->delete();
        return redirect()->route('master_bahan.index');
    }
}
