<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
            protected $fillable = [
        'app_name',
        'logo',
        'fav_icon',
        'mail_mailer',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
        'smtp_from_address',
        'smtp_from_name',
        'footer_text',
        'contact_email',
        'contact_phone',
    ];

}
