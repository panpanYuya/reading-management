<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $user_id = 'user_id';

    protected $user_name = 'user_name';

    protected $mail_address = 'mail_address';

    protected $password = 'password';

    protected $login_token = 'login_token';

    protected $temporary_token = 'temporary_token';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';

}
