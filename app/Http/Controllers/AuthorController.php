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
}
