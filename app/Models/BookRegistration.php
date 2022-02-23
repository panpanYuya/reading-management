<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $bookId = 'book_id';

    protected $userId = 'user_id';

    protected $stickyNum = 'unread_flg';

    protected $stickyTitle = 'book_cover_URL';

    protected $stickyMemo = 'book_impression';

    protected $genreId = 'genre_id';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
