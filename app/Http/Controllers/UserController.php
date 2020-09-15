<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Instrument;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUsers(){
        $users = User::all();
        return view('users.all',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'users' => $users,
        ]);
    }

    public function getUser($id){
        $user = User::find($id);
        return view('users.single',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'user' => $user,
        ]);
    }

    public function editUserByAdmin(Request $req){
        $user = User::find($req->input('id'));
        $user->name = $req->input('name');
        $user->email = $req->input('email');

        $user->save();
        return redirect()->route('users');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('main');
    }
}
