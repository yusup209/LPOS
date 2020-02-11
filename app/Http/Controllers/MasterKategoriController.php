<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterKategori;

class MasterKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = MasterKategori::all();
        return view('pages.kategori.index', compact('kategori'));
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
        $kategori = new MasterKategori();
        $kategori->kategori = $request->input('kategori');
        $kategori->save();
        
        return redirect()->route('kategori.index')->with('sukses','berhasil menambah kategori');
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
        $kategori = MasterKategori::where('id', $id)->get()[0];
        return view('pages.kategori.edit', compact('kategori'));
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
        $kategori = MasterKategori::find($id);
        $kategori->kategori = $request->input('kategori');
        $kategori->save();

        return redirect()->route('kategori.index')->with('sukses','sukses update kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterKategori::find($id)->delete();
        return redirect()->route('kategori.index')->with('sukses','sukses update kategori');
    }
}
