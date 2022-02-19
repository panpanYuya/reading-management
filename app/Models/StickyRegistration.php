<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickyRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $bookId = 'book_id';

    protected $userId = 'user_id';

    protected $stickyNum = 'sticky_num';

    protected $stickyTitle = 'sticky_title';

    protected $stickyMemo = 'sticky_memo';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
