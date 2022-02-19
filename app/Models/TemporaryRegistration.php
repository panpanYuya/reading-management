<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryRegistration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $userId = 'user_id';

    protected $username = 'user_name';

    protected $mailAddress = 'mail_address';

    protected $password = 'password';

    protected $loginToken = 'login_token';

    protected $temporaryToken = 'temporary_token';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';

}
