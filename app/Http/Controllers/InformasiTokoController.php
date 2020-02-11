<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;

class InformasiTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::where('id', 1)->get()[0];
        $jml_profil = $profil->count();
        return view('pages.informasiToko.index', compact('profil','jml_profil'));
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
        $profil = new Profil;
        $profil->nama_koperasi = $request->input('nama_koperasi');
        $profil->alamat_koperasi = $request->input('alamat');
        $profil->keterangan = $request->input('deskripsi');
        $profil->no_telp = $request->input('no_telp');
        $profil->kode_pos = $request->input('kode_pos');
        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        if ($foto->move('assets/img/', $nama_foto)){
            $profil->foto = $nama_foto;
        } else {
            dd('gagal');
        }
        $profil->foto = $nama_foto;
        $profil->kode_pos = $request->input('kode_pos');
        if ($profil->save()) {
            return redirect()->route('informasiToko.index')->with(['success' => true, 'message' => 'sukses menambahkan data informasi toko']);
        } else {
            return redirect()->route('informasiToko.index')->with(['success' => false, 'message' => 'gagal menambahkan data informasi toko']);
        }
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
        //
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
        $profil = Profil::find($id);
        $profil->nama_koperasi = $request->input('nama_koperasi');
        $profil->alamat_koperasi = $request->input('alamat_koperasi');
        $profil->keterangan = $request->input('keterangan');
        $profil->no_telp = $request->input('no_telp');
        $foto = $request->input('foto');
        $nama_foto = '';

        $profil->foto = $nama_foto;
        $profil->kode_pos = $request->input('kode_pos');
        if ($profil->save()) {
            return redirect()->route('informasiToko.index')->with(['success' => true, 'message' => 'sukses mengupdate data informasi toko']);
        } else {
            return redirect()->route('informasiToko.index')->with(['success' => false, 'message' => 'gagal mengupdate data informasi toko']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
