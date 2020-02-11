<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class DaftarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_user = User::where('hak_akses', '!=','superadmin')->get();

        return view('pages.daftarUser.index', compact('daftar_user'));
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
        $user = new User;
        $user->nama = $request->input('nama');
        $user->kontak = $request->input('no_telp');
        $user->alamat = $request->input('alamat');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        if ($foto->move('assets/img/', $nama_foto)){
            $user->foto = $nama_foto;
        } else {
            dd('gagal');
        }
        $user->alamat = '';
        $user->hak_akses = $request->input('hak_akses');
        
        if($user->save()){
            return redirect()->route('daftarUser.index')->with('sukses','sukses menambahkan data user');
        } else {
            return redirect()->route('daftarUser.index')->with('gagal','gagal menambahkan data user');
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
        $user = User::where('id', $id)->where('hak_akses','!=','superadmin')->get()[0];
        return view('pages.daftarUser.edit', compact('user'));
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
        $user = User::find($id);
        $user->nama = $request->input('nama');
        $user->kontak = $request->input('kontak');
        $user->alamat = $request->input('alamat');
        $user->username = $request->input('username');
        if (trim($request->input('password')) != ''){
            $user->password = Hash::make($request->input('password'));
        }
        $user->hak_akses = $request->input('hak_akses');
        
        if($user->save()){
            return redirect()->route('daftarUser.index')->with('sukses','sukses mengupdate data user');
        } else {
            return redirect()->route('daftarUser.index')->with('gagal','gagal mengupdate data user');
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
        if (User::find($id)->delete()){
            return redirect()->route('daftarUser.index')->with('sukses','sukses menghapus data user');
        } else {
            return redirect()->route('daftarUser.index')->with('gagal','gagal menghapus data user');
        }
    }
}
