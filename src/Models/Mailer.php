<?php

namespace Pondit\Mailer\Models;

use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{

    protected $table = 'emails';

    protected $fillable = [
        'sender_name',
        'email_from',
        'email_to',
        'reply_mail',
        'subject',
        'introduction',
        'thanks_text',
        'message',
        'total_emails'
    ];

}
