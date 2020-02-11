<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterProduk;
use App\TransaksiHeader;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (\Auth::user()->hak_akses == 'kasir'){
            $request->session()->put('no_ref', rand(100000,999999));
        }

        if (\Auth::user()->hak_akses == 'superadmin'){
            $jml_brg = MasterProduk::all()->count();
            $total_penjualan = TransaksiHeader::sum('jumlah');
            $jml_user = User::where('hak_akses','!=','superadmin')->count();
            return view('home', compact('jml_brg','total_penjualan','jml_user'));    
        }

        return view('home');
    }
}
