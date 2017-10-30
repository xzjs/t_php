<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clock extends Model
{
    public function rings()
    {
        return $this->belongsToMany('App\Ring');
    }
}
