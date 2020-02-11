<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiHeader extends Model
{
    public function kasir()
    {
        return $this->belongsTo('\App\User', 'id_kasir');
    }
}
