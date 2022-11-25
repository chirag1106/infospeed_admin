<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'emp_type',
        'emp_name',
        'emp_email',
        'emp_password',
        'emp_address',
        'emp_wages',
        'emp_phone',
        'emp_date',
    ];
}
