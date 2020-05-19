<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'video',
        'answer',
        'answer_date',
        // 'grade',
        'user_id',
        'expert_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function expert()
    {
        return $this->belongsTo('App\Expert');
    }
}
