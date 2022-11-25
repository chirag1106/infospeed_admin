<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_builder extends Model
{
    use HasFactory;
    protected $table = 'form_builder';
    protected $fillable = [
        'form_id ',
        'form_title',
        'number_of_questions',
        'form_description',
        'question_table_name',
        'answer_table_name',
    ];
}
