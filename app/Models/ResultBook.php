<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'api_id',
        'book_cover_url',
        'title',
        'author',
        'registFlg'
    ];
}
