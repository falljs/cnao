<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionalMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'director_title',
        'director_subtitle',
        'director_content',
        'director_image',

        'minister_title',
        'minister_subtitle',
        'minister_content',
        'minister_image',
    ];
}
