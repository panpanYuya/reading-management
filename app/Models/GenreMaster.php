<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMaster extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $genre = 'genre';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
