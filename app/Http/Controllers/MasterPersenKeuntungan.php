<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterPersenJual;

class MasterPersenKeuntungan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persen = MasterPersenJual::all();
        return view('pages.persen_keuntungan.index', compact('persen'));
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
        $persen = new MasterPersenJual();
        $persen->persen_jual = $request->input('persen');
        $persen->save();
        
        return redirect()->route('persen_keuntungan.index')->with(['success' => 'berhasil menambah persen']);
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
        $persen = MasterPersenJual::where('id',$id)->get()[0];
        return view('pages.persen_keuntungan.edit', compact('persen'));
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
        $persen = MasterPersenJual::find($id);
        $persen->persen_jual = $request->input('persen');
        $persen->save();

        return redirect()->route('persen_keuntungan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterPersenJual::find($id)->delete();
        return redirect()->route('persen_keuntungan.index');
    }
}
