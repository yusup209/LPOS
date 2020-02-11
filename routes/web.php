<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'superadmin', 'middleware'=>'role.superadmin'], function(){
    Route::resource('informasiToko', 'InformasiTokoController');
    Route::resource('daftarUser', 'DaftarUserController');
    Route::resource('kurs', 'Kurs');
    Route::resource('kategori', 'MasterKategoriController');
    Route::resource('unit', 'MasterUnitController');
    Route::resource('persen_keuntungan', 'MasterPersenKeuntungan');
    Route::resource('master_minimum', 'MasterStokMinimumController');
    Route::resource('master_ppn', 'MasterPpnController');
    Route::resource('master_bahan', 'MasterBahanController');
    Route::resource('master_produk', 'MasterProdukController');
    Route::resource('stok', 'StokController');
    Route::resource('produk_kosong', 'DataProdukKosongController');
    Route::resource('laporan_transaksi', 'LaporanTransaksiController');
});

Route::group(['prefix'=>'kasir', 'middleware'=>'role.kasir'], function(){
    Route::resource('pos', 'POSController');
    Route::resource('checkout', 'CheckoutController');
    Route::resource('do_transaction', 'DoTransaction');
    Route::resource('invoice', 'InvoiceController');
});