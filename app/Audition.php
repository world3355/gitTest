<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    protected $fillable = [
        'title',
        'content',
        'end_date',
        'aud_image',
        'rank',
        'video',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function resumes()
    {
        return $this->hasMany('App\Resume');
    }

}
