<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiHeader;
use App\TransaksiSementara;
use App\TransaksiDetail;

class DoTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ref = $request->session()->get('no_ref');
        $tgl = date('Y-m-d');
        $trx_header = new TransaksiHeader;
        $trx_header->no_ref = $ref;
        $trx_header->jumlah = $request->input('total');
        $trx_header->tipe_pembayaran = "tunai";
        $trx_header->id_kasir = auth()->user()->id;
        $trx_header->dibayar = $request->input('dibayar');
        $trx_header->status = "sudah diproses";
        $trx_header->save();

        $sementara = TransaksiSementara::where('no_ref', $ref)->get();

        foreach ($sementara as $x) {
            $trx_detail = new TransaksiDetail;
            $trx_detail->id_produk = $x->id_produk;
            $trx_detail->no_ref = $x->no_ref;
            $trx_detail->qty = $x->qty;
            $trx_detail->harga = $x->harga;
            $trx_detail->subtotal = $x->subtotal;
            $trx_detail->id_kasir = auth()->user()->id;
            $trx_detail->save();
        }

        TransaksiSementara::where('no_ref',$ref)->delete();
        $request->session()->put('no_ref', rand(100000,999999));

        return redirect()->route('invoice.index');
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
        //
    }
}
