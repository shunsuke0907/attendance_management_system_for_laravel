<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    // hasMany

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
