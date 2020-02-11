<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    public function transaksi()
    {
        return $this->belongsTo('\App\TransaksiHeader', 'id_trx');
    }

    public function produk()
    {
        return $this->belongsTo('\App\MasterProduk', 'id_produk');
    }

    public function kasir()
    {
        return $this->belongsTo('\App\User', 'id_kasir');
    }
}
