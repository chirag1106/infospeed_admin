<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VidhanSabha extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'loksabha_id',
        'vs_name',
    ];
    public function get_loksabha(){
        return $this->hasOne('App\Models\LokSabha', 'id', 'loksabha_id');
    }
}
