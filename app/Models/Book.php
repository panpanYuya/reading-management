<?php

namespace App\Models;

use App\Models\UserBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'api_id',
        'book_cover_url',
        'title',
        'author',
        'description',
    ];

    public function userbooks()
    {
        return $this->hasMany(UserBook::class);
    }
}
