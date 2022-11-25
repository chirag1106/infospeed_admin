<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_assign_employee extends Model
{
    use HasFactory;
     protected $table = 'form_assign_employee';
    protected $fillable = [
        'assign_id ',
        'employee_id',
        'form_id',
    ];
}
