<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterProduk;
use App\MasterKategori;
use App\MasterUnit;
use App\MasterKurs;
use App\MasterPersenJual;
use App\MasterStok;

class MasterProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = MasterProduk::all();
        return view('pages.master_produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stok_min = MasterStok::limit(1)->get()[0]->stok_minimum;
        $kategoris = MasterKategori::all();
        $units = MasterUnit::all();
        $untung = MasterPersenJual::all();
        $kurs = MasterKurs::all();
        return view('pages.master_produk.create', compact('kategoris', 'units', 'kurs', 'untung', 'stok_min'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $stok_min = MasterStok::limit(1)->get()[0]->stok_minimum;
        $produk = new MasterProduk;
        // $produk->barcode = $request->input('barcode');
        $produk->barcode = rand(1000000000, 9999999999);
        $produk->nama = $request->input('nama');
        $stok = trim($request->input('stok'));
        if ($stok < $stok_min) {
            return redirect()->route('master_produk.create')->with(['gagal','stoknya tidak boleh kurang dari stok minimum yaaa']);
        }
        $produk->stok = $stok;
        $produk->id_kategori = $request->input('kategori');
        $produk->id_kurs = $request->input('kurs');
        $produk->id_unit = $request->input('unit');
        $produk->expired = $request->input('expired');

        $hargaBeli = $request->input('harga_beli');
        $persenUntung = $request->input('untung');
        $jmlUntung = $hargaBeli / $persenUntung;
        $hargaJual = $jmlUntung + $hargaBeli;
        $produk->harga_beli = $hargaBeli;
        $produk->harga_jual = $hargaJual;
        $produk->untung = $jmlUntung;
        $produk->status = "Tersedia";
        $produk->print_label = $request->input('nama');
        $produk->diskon = $request->input('diskon');
        $produk->keterangan = $request->input('keterangan');

        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        if ($foto->move('assets/img/', $nama_foto)) {
            $produk->foto = $nama_foto;
        } else {
            dd('gagal');
        }

        $produk->ganti_harga = $request->input('ganti_harga');
        $produk->save();

        return redirect()->route('master_produk.index')->with('sukses','sukses tambah data produk');
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
        $id = $id;
        $stok_min = MasterStok::limit(1)->get()[0]->stok_minimum;
        $produk = MasterProduk::where('id', $id)->get()[0];
        $kategoris = MasterKategori::all();
        $units = MasterUnit::all();
        $untung = MasterPersenJual::all();
        $kurs = MasterKurs::all();
        return view('pages.master_produk.edit', compact('produk', 'id', 'stok_min', 'kategoris', 'untung', 'kurs', 'units'));
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
        $stok_min = MasterStok::limit(1)->get()[0]->stok_minimum;
        $produk = MasterProduk::find($id);

        $produk->nama = $request->input('nama');
        $stok = trim($request->input('stok'));
        if ($stok < $stok_min) {
            return redirect()->route('master_produk.edit', $id)->with('gagal','stoknya tidak boleh kurang dari stok minimum yaaa');
        }
        $produk->stok = $stok;
        $produk->id_kategori = $request->input('kategori');
        $produk->id_kurs = $request->input('kurs');
        $produk->id_unit = $request->input('unit');
        $produk->expired = $request->input('expired');

        $hargaBeli = $request->input('harga_beli');
        $persenUntung = $request->input('untung');
        $jmlUntung = $hargaBeli / $persenUntung;
        $hargaJual = $jmlUntung + $hargaBeli;
        $produk->harga_beli = $hargaBeli;
        $produk->harga_jual = $hargaJual;
        $produk->untung = $jmlUntung;
        $produk->status = "Tersedia";
        $produk->print_label = $request->input('nama');
        $produk->diskon = $request->input('diskon');
        $produk->keterangan = $request->input('keterangan');

        $foto = $request->file('foto');

        if ($foto != null) {
            $nama_foto = $foto->getClientOriginalName();
            if ($foto->move('assets/img/', $nama_foto)) {
                $produk->foto = $nama_foto;
            } else {
                dd('gagal');
            }
        }

        $produk->ganti_harga = $request->input('ganti_harga');
        $produk->save();

        return redirect()->route('master_produk.index')->with('sukses','sukses update data produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterProduk::find($id)->delete();
        return redirect()->route('master_produk.index')->with('sukses','sukses menghapus data produk');
    }
}
