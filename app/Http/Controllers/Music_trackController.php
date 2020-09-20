<?php

namespace App\Http\Controllers;

use App\Author;
use App\Genre;
use App\Instrument;
use App\Message;
use App\Music_track;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Music_trackController extends Controller
{
    function getSingleTrack($id){
        return view('music_track.single_track',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_track' => Music_track::find($id),
            'comments' => Message::where('music_track_id', $id)
                ->orderBy('created_at')->get(),
        ]);
//        return dd(Message::where('music_track_id', $id)->orderBy('created_at')
//            ->get());
    }

    function download($id){
        $track = Music_track::find($id);
//        return $track->notes_path;
        return response()->download($track->notes_path);
//        return response()->download('pdfs/Prelude_in_G_Minor_Op._23_No._5.pdf');
    }

    function addComment(Request $req,$id){
        $comment = new Message();
        $comment->text = $req->comment;
        $comment->user_id = $req->user_id;
        $comment->music_track_id = $id;
        $comment->created_at = Carbon::now();
        $comment->save();

        return redirect()->route('single_track',$id);
    }

    function getAllTracksForAdmin(){
        return view('music_track.all',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'music_tracks' => Music_track::all(),
        ]);

    }

    function addMusicTrack(){
        return view('create.music_track',[
            'authors' => Author::all()->sortBy('name'),
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
        ]);
    }

    function saveMusicTrack(Request $req){
        $track = new Music_track();
        $track->name = $req->input('name');
        $track->author_id = $req->author;
        $track->genre_id = $req->genre;
        $track->instrument_id = $req->instrument;
        $track->year = $req->input('year');
        $track->complexity = $req->input('complexity');
        $track->link = $req->input('link');
        $track->description = $req->description;
        $track->created_at = Carbon::now();
        $track->updated_at = Carbon::now();

        $req->picture_path->storeAs('trackPictures', $req->picture_path->getClientOriginalName());
        $track->picture_path = '/storage/trackPictures/'.$req->picture_path->getClientOriginalName();
        $req->notes_path->storeAs('notes', $req->notes_path->getClientOriginalName());
        $track->notes_path = 'storage/notes/'.$req->notes_path->getClientOriginalName();

        $track->save();

        return redirect()->route('music_tracks_all');

    }

    public function delete($id){
        $track = Music_track::find($id);
        $track->delete();
        return redirect()->route('music_tracks_all');
    }

    public function editMusicTrack($id){
        $track = Music_track::find($id);
        return view('edit.single_music_track',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'authors' => Author::all()->sortBy('name'),
            'music_track' => $track,
        ]);
    }

    public function updateMusicTrack(Request $req, $id){
        $track = Music_track::find($id);
        $track->name = $req->input('name');
        $track->author_id = $req->author;
        $track->genre_id = $req->genre;
        $track->instrument_id = $req->instrument;
        $track->year = $req->input('year');
        $track->complexity = $req->input('complexity');
        $track->link = $req->input('link');
        $track->description = $req->description;
        $track->created_at = Carbon::now();
        $track->updated_at = Carbon::now();

        if (!empty($req->picture_path)) {
            $req->picture_path->storeAs('trackPictures', $req->picture_path->getClientOriginalName());
            Storage::delete(mb_strcut($track->picture_path,9));
            $track->picture_path = '/storage/trackPictures/' . $req->picture_path->getClientOriginalName();
        }
        if (!empty($req->notes_path)) {
            $req->notes_path->storeAs('notes', $req->notes_path->getClientOriginalName());
            Storage::delete(mb_strcut($track->notes_path,8));
            $track->notes_path = 'storage/notes/' . $req->notes_path->getClientOriginalName();
        }

        $track->save();

        return redirect()->route('music_tracks_all');
    }
}
