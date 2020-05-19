<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

// use Illuminate\Database\Eloquent\Model;

class LectureUser extends Pivot
{
    protected $fillable = [
        'accuracy',
        'clear',
        'user_id',
        'lecture_id',
    ];

    public function user()
    {
        return $this->beLongsTo('App\user');
    }

    public function lecture()
    {
        return $this->beLongsTo('App\Lecture');
    }
}
