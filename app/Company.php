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
    
    public static function return_stars($score)
    {
        $stars = '';
        
        if((int)$score != null){
            for($i=0; $i<(int)$score; $i++){
                $stars .= '★';
            }
            for($i=$score; $i<5; $i++){
                $stars .= '☆';
            }
        }else{
            $stars='Error';
        }
        return $stars;
    }
}

