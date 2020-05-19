<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'score',
        'message',
        'result',
        'user_id',
        'audition_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function audition()
    {
        return $this->belongsTo('App\Audition');
    }
}
