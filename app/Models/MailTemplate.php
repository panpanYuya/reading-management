<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $sender = 'sender';

    protected $subject = 'subject';

    protected $destination = 'destination';

    protected $emailBody = 'email_body';

    protected $createdAt = 'created_at';

    protected $updatedAt = 'updated_at';
}
