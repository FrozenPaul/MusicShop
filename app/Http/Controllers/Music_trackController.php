<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Instrument;
use App\Music_track;
use Illuminate\Http\Request;

class Music_trackController extends Controller
{
    function getSingleTrack($id){
        return view('music_track.single_track',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_track' => Music_track::find($id),
        ]);
    }
}
