<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LookBackTagRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $userId = 'user_id';

    protected $tagTitle = 'tag_title';

    protected $colorCode = 'color_code';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
