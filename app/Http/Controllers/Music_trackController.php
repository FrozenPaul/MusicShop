<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Instrument;
use App\Message;
use App\Music_track;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
}
