<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music_track extends Model
{
    //

    public function getRatingAttribute()
    {
        $global_rating = 0;
        $ratings = Rating::where('music_track_id', $this->id)->get();
        foreach ($ratings as $rate){
            $global_rating += $rate->rating;
        }
        if (count($ratings) != 0)
            $global_rating /= count($ratings);
        else $global_rating = 0;

        return $global_rating;
    }
}
