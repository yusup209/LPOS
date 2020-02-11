<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterUnit;

class MasterUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = MasterUnit::all();
        return view('pages.unit.index', compact('unit'));
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
        $unit = new MasterUnit();
        $unit->unit = $request->input('unit');
        $unit->save();
        
        return redirect()->route('unit.index')->with('sukses','berhasil menambah unit');
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
        $unit = MasterUnit::where('id',$id)->get()[0];
        return view('pages.unit.edit', compact('unit'));
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
        $unit = MasterUnit::find($id);
        $unit->unit = $request->input('unit');
        $unit->save();

        return redirect()->route('unit.index')->with('sukses','sukses update unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterUnit::find($id)->delete();
        return redirect()->route('unit.index')->with('sukses','sukses hapus data unit');
    }
}
