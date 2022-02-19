<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    use HasFactory;
    //そもそも.envファイルで定義をしているのだから必要ないんじゃないか？
    //protected $connection = 'sqlite';

    protected $primaryKey = 'id';

    protected $userName = 'user_name';

    protected $mailAddress = 'mail_address';

    protected $password = 'password';

    protected $loginToken = 'login_token';

    protected $created_at = 'created_at';

    protected $updated_at = 'updated_at';
}
