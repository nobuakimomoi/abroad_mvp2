<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;   

class Company extends Model
{
    //
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}

