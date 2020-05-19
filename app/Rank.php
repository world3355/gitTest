<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'rank_name',
        'criterion',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
