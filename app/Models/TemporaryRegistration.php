<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemporaryRegistration extends Model{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'mail_address',
        'password',
        'login_token',
        'temporary_token',
        'created_at',
        'updated_at',
    ];

}
