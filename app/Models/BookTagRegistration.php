<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTagRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $userId = 'user_id';

    protected $tagId = 'tag_id';

    protected $bookId = 'book_id';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
