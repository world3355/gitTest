<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'area',
    ];

    public $timestamps = false;

    public function experts()
    {
        return $this->hasMany('App\Expert');
    }
}
