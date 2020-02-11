<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProdukOut extends Model
{
    public function produk()
    {
        return $this->belongsTo('\App\MasterProduk', 'id_produk');
    }

    public function koperasi()
    {
        return $this->belongsTo('\App\User', 'id_koperasi');
    }
}
