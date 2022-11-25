<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'loksabha_id',
        'vidhansabha_id',
        'block_name',
    ];
    public function get_loksabha(){
        return $this->hasOne('App\Models\LokSabha', 'id', 'loksabha_id');
    }
    public function get_vidhansabha(){
        return $this->hasOne('App\Models\VidhanSabha', 'id', 'vidhansabha_id');
    }
}
