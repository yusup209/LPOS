<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBahan extends Model
{
    public function unit(){
        return $this->belongsTo('\App\MasterUnit','id_unit');
    }
}
