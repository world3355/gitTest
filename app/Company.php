<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'business_number',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function experts()
    {
        return $this->hasMany('App\Expert');
    }
}
