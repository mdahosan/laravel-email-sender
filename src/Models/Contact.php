<?php

namespace Pondit\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'sender_name',
        'email_from',
        'email_to',
        'reply_mail',
        'subject',
        'introduction',
        'thanks_text',
        'message'
    ];

}
