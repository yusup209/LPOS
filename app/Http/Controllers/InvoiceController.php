<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiHeader;
use App\TransaksiDetail;
use App\TransaksiSementara;
use App\Profil;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $no_ref = TransaksiHeader::orderBy('id','desc')->limit(1)->get()[0]->no_ref;
        $trx_header = TransaksiHeader::where('no_ref', $no_ref)->get();
        $trx_detail = TransaksiDetail::where('no_ref', $no_ref)->get();
        // $no_ref = $r->session()->get('no_ref');
        
        $subtotal = TransaksiDetail::where('no_ref', $no_ref)->sum('subtotal');
        $profil = Profil::all();
        return view('pages.kasir.invoice', compact('trx_header','trx_detail','profil','subtotal','no_ref'));
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
        //
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
