<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $table = 'company_settings';

    protected $fillable = [
        'company_name',
        'phone',
        'whatsapp_link',
        'email',
        'address',
        'map_embed',
        'seo_description',
    ];
}
