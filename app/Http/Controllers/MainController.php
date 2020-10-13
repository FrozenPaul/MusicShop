<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Instrument;
use App\Music_track;

class MainController extends Controller
{

    public function main(){
        $music_tracks =  Music_track::all();
        $last_tracks = $music_tracks->sortByDesc('created_at')->slice(0,10);
        $rating_tracks = $music_tracks->sortByDesc('rating')->slice(0,10);

        return view('main',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
//            'music_tracks' => $music_tracks->sortBy('name'),
            'last_tracks' => $last_tracks,
            'rating_tracks' => $rating_tracks,
            'music_tracks' => Music_track::orderBy('name')->paginate(6),
        ]);
    }

    public function getAllMusicByGenre($id){
        $music_tracks =  Music_track::all();
        $last_tracks = $music_tracks->sortByDesc('created_at')->slice(0,7);
        $rating_tracks = $music_tracks->sortByDesc('rating')->slice(0,7);
        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::where('genre_id', $id)
                ->orderBy('name')->paginate(6),
            'last_tracks' => $last_tracks,
            'rating_tracks' => $rating_tracks,
            'search_tag' => 'Результаты поиска по жанру: "'.Genre::find($id)->name.'"',
        ]);
    }

    public function getAllMusicByName(Request $req){
        $music_tracks =  Music_track::all();
        $last_tracks = $music_tracks->sortByDesc('created_at')->slice(0,7);
        $rating_tracks = $music_tracks->sortByDesc('rating')->slice(0,7);
        $track = $req->input('music_name');
        $music_tracks = Music_track::where('name','like','%'.$track.'%')
            ->orderBy('name')->paginate(6);

        $music_tracks->appends(['music_name' => $track]);

        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
//            'music_tracks' => Music_track::where('name','like','%'.$track.'%')
//                ->orderBy('name')->get(),
            'last_tracks' => $last_tracks,
            'rating_tracks' => $rating_tracks,
            'music_tracks' => $music_tracks,
            'search_tag' => 'Результаты поиска по названию: "'.$track.'"',
        ]);
    }

    public function getAllMusicByInstrument($id){
        $music_tracks =  Music_track::all();
        $last_tracks = $music_tracks->sortByDesc('created_at')->slice(0,7);
        $rating_tracks = $music_tracks->sortByDesc('rating')->slice(0,7);
        return view('main', [
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::where('instrument_id', $id)
                ->orderBy('name')->paginate(6),
            'last_tracks' => $last_tracks,
            'rating_tracks' => $rating_tracks,
            'search_tag' => 'Результаты поиска по инструменту: "'.Instrument::find($id)->name.'"',
        ]);
    }

//    public function download($download_link){
//        return response()->download($download_link);
//    }
}
