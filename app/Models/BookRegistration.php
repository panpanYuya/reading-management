<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRegistration extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'api_id',
        'title',
        'author',
        'book_cover_url',
        'genre_id',
        'created_at',
        'updated_at'
    ];
}
