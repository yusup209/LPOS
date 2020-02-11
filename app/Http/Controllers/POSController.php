<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiSementara;
use App\MasterStok;
use App\MasterProduk;


class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trx_sementara = TransaksiSementara::all();
        $no_ref = $request->session()->get('no_ref');
        $jml_trx = $trx_sementara->count();
        $min_stok = MasterStok::first()->stok_minimum;
        $produk = MasterProduk::where('stok', '>', $min_stok)->get();
        $total_belanja = TransaksiSementara::sum('subtotal');
        return view('pages.kasir.index', compact('produk', 'trx_sementara', 'total_belanja', 'jml_trx','no_ref'));
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
        $produk = MasterProduk::where('id', $request->input('produk'))->get()[0];

        if ($request->input('qty') > $produk->stok) {
            return redirect()->route('pos.index')->with('gagal', 'jumlah barang tidak boleh melebihi stok');
        } else {
            $cart = new TransaksiSementara;
            $cart->id_produk = $request->input('produk');
            $cart->no_ref = $request->input('no_ref');
            // $cart->produk = $produk->nama;
            $cart->qty = $request->input('qty');
            $cart->harga = $produk->harga_beli;
            $cart->subtotal = $produk->harga_beli * $request->input('qty');
            $cart->barcode = $produk->barcode;
            $cart->save();

            $produk_update = MasterProduk::find($request->input('produk'));
            $produk_update->stok = $produk->stok - $request->input('qty');
            $produk_update->save();

            return redirect()->route('pos.index')->with('sukses', 'sukses menambah barang ke dalam keranjang');
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
        return view('pages.pos.invoice');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trx_sementara = TransaksiSementara::find($id);
        
        return view('pages.pos.chgqty');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trx_sementara = TransaksiSementara::where('id', $id)->get()[0];
        $stok_sementara = $trx_sementara->qty;
        $id_produk = $trx_sementara->id_produk;

        $prev_produk_stock = MasterProduk::where('id', $id_produk)->get()[0]->stok;
        // dd($prev_produk_stock + $stok_sementara);
        $produk = MasterProduk::find($id_produk);
        $produk->stok = $prev_produk_stock + $stok_sementara;
        $produk->save();

        // dd($id_produk);

        TransaksiSementara::find($id)->delete();
        
        return redirect()->route('pos.index')->with('sukses','sukses menghapus item dari keranjang');
    }
}
