<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiSementara extends Model
{
    public function produk()
    {
        return $this->belongsTo('\App\MasterProduk', 'id_produk');
    }
}
