<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickyRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_book_id',
        'page_number',
        'sticky_title',
        'sticky_memo',
    ];

}
