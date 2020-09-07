<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use function GuzzleHttp\Promise\all;

class AuthorController extends Controller
{
    public function getAllAuthors(){
        return view('authors',['authors' => Author::all()->sortBy('name')]);
    }

    public function getAuthorById($id){
//        return Author::find('id' , $id)->name;
        return view('author',['author' => Author::find($id)]);
    }

    public function getAuthorByName(Request $req){

        $author = $req->input('author_name');
//        dd(Author::all()->where('name','like',$author));
        $authors = Author::where('name','like','%'.$author.'%');
//        if ($authors != null)
            return view('authors',['authors' => Author::where('name','like','%'.$author.'%')
            ->orderBy('name','desc')->get()]);
//        else return redirect('authors');

    }


}
