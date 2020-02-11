<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProduk extends Model
{
    public function unit()
    {
        return $this->belongsTo('\App\MasterUnit', 'id_unit');
    }

    public function kurs()
    {
        return $this->belongsTo('\App\MasterKurs', 'id_kurs');
    }

    public function kategori()
    {
        return $this->belongsTo('\App\MasterKategori', 'id_kategori');
    }
}
