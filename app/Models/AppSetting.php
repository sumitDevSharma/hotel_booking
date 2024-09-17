<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $table = 'app_settings';

    protected $fillable = [
        'site_title',
        'time_zone',
        'force_ssl',
        'currency',
        'currency_symbol',
        'theme',
        'fraction_number',
        'paginate',
        'error_log',
        'strong_password',
        'registration',
        'sender_email',
        'sender_email_name',
    ];
}
