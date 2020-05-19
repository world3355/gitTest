<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestUser extends Model
{
    protected $fillable = [
        'highest_score',
        'accuracy',
        'user_id',
        'contest_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contest()
    {
        return $this->belongsTo('App\Contest');
    }
}
