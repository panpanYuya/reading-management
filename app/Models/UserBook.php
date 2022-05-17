<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'read_status',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

}
