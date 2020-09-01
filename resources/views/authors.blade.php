@extends('layouts.app')

@section('header')

    <div class="form-row">
        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
            <a href="{{route('main')}}" class="navbar-brand" style="color:white; padding:5px;">
                <img src="/images/Logotype.png" alt="">
                ImagineMusic
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse" style="justify-content: space-between;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 ml-4">
                            <input class="form-control mr-sm-2" type="search" placeholder="Поиск"
                                   aria-label="Поиск">
                            <button class="btn btn-outline-light my-2 my-sm-1" type="submit">Поиск</button>
                        </form>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('authors')}}">Композиторы</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('about')}}">О нас</a>
                    </li>

                </ul>
                <ul class="navbar-nav pull-right">
                    <li class="nav-item">
                        <a href="logIn.html" class="btn btn-outline-light my-2 my-sm-1 ml LogInButton">Войти</a>
                    </li>

                </ul>
            </div>
        </nav>

    </div>
@endsection



@section('content')
    <div style="display: block">
    <h1 class="text-center py-3">Композиторы</h1>

    <form class="form-inline my-2 my-lg-0 ml-4">
        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-dark my-2 my-sm-1" type="submit">Поиск</button>
    </form>
    <h2 class="py-3">Список композиторов:</h2>

    <ul class="Composers">

    @foreach ($authors as $author)
            <li><a href="{{route('author', $author->id)}}">{{ $author->name }}</a></li>
    @endforeach
    </ul>
    </div>


@endsection
