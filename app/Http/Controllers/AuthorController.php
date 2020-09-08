<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Instrument;
use Carbon\Carbon;
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
//        if ($authors_admin != null)
            return view('authors',['authors' => Author::where('name','like','%'.$author.'%')
            ->orderBy('name','desc')->get()]);
//        else return redirect('authors_admin');

    }

    public function getAllAuthorsForAdmin(){
        return view('all_authors',[
            'genres' => Genre::all()->sortBy('name'),
            'instruments' => Instrument::all()->sortBy('name'),
            'authors' => Author::all()
        ]);
    }

    public function addAuthor(){
        return view('create.author');
//        return redirect()->route('authors_all');
    }

    public function saveAuthor(Request $req){
        $author = new Author();
        $author->name = $req->input('name');
        $author->age = $req->input('age');
        $author->sity_of_birth = $req->input('sity_of_birth');
        $author->date_of_birth = $req->input('date_of_birth');
        $author->date_of_death = $req->input('date_of_death');
        $author->place_of_death = $req->input('place_of_death');
        $author->buried = $req->input('buried');
        $author->jobs = $req->input('jobs');
        $author->genres = $req->input('genres');
        $author->instruments = $req->input('instruments');
        $author->rewards = $req->input('rewards');
        $author->picture_path = '';
        $author->created_at = Carbon::now();
        $author->description = $req->description;

        $author->save();

        return redirect()->route('authors_all');
    }

}
