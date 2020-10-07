<?php

namespace App\Http\Controllers;

use App\Music_track;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    //
    public function saveRating(Request $req){
        $rating = new Rating();
        $rate = Rating::where([
            ['user_id', Auth::id()],
            ['music_track_id', $req->input('music_track_id')]
        ])->first();
        if($rate){
            $rate->delete();
        }
        $rating->user_id = Auth::id();
        $rating->music_track_id = Music_track::find($req->input('music_track_id'))->id;
        $rating->rating = $req->input('star');
        $rating->save();
    }

    public function test(){
        $rating = Rating::where('user_id', Auth::id())->first()->exists();
//        foreach ($rating as $rate){
//            $rate->delete();
//        }
        return $rating;
//        return 'ok';
    }
}
