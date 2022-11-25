<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'loksabha_id',
        'vidhansabha_id',
        'block_id',
        'panchayat_id',
        'village_choosing',
        'village_name',
    ];
    public function get_loksabha(){
        return $this->hasOne('App\Models\LokSabha', 'id', 'loksabha_id');
    }
    public function get_vidhansabha(){
        return $this->hasOne('App\Models\VidhanSabha', 'id', 'vidhansabha_id');
    }
    public function get_block(){
        return $this->hasOne('App\Models\Block', 'id', 'block_id');
    }
    public function get_panchayat(){
        return $this->hasOne('App\Models\Panchayat', 'id', 'panchayat_id');
    }
}
