<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiSementara;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $no_ref = $r->session()->get('no_ref');
        $trx_sementara = TransaksiSementara::where('no_ref', $no_ref)->get();
        $subtotal = TransaksiSementara::sum('subtotal');
        return view('pages.kasir.checkout',compact('no_ref','trx_sementara','subtotal'));
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
        $cash = $request->input('nominal');
        $total = $request->input('total_harga');
    

        if ($cash < $total){
            return redirect()->route('checkout.index')->with('gagal','uang anda kurang');
        } else {
            return redirect()->route('checkout.index')->with('cash',$cash);
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
