<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'last_login',
        'confirm_code',
    ];

    protected $hidden = [
        'last_login',
        'confirm_code',
    ];
}
