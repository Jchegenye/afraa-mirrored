<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'theme_type',
        'bg_photo_login',
        'title_login',
        'desc_login',
        'photo_login',
        'photo_asc',
        'photo_aga',
        'status'
    ];
}
