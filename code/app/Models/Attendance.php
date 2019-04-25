<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // belongsTo

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
