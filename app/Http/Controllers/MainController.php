<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Instrument;
use App\Music_track;

class MainController extends Controller
{
    public function main(){
        return view('main',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::all()->sortBy('name'),
//            'music_tracks' => Music_track::orderBy('name')->paginate(6),
        ]);
    }

    public function getAllMusicByGenre($id){
        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::where('genre_id', $id)
                ->orderBy('name')->get(),
        ]);
    }

    public function getAllMusicByName(Request $req){
        $track = $req->input('music_name');
        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::where('name','like','%'.$track.'%')
                ->orderBy('name')->get(),
//            'music_tracks' => Music_track::where('name','like','%'.$track.'%')
//                ->orderBy('name')->paginate(6),
        ]);
    }

    public function getAllMusicByInstrument($id){
        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::where('instrument_id', $id)
                ->orderBy('name')->get(),
        ]);
    }
}
