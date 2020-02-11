<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProdukIn extends Model
{
    public function produk()
    {
        return $this->belongsTo('\App\MasterProduk', 'id_produk');
    }

    public function koperasi()
    {
        return $this->belongsTo('\App\MasterKoperasi', 'id_koperasi');
    }
}
