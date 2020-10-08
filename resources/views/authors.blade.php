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
                        <form method="get" action="{{route('search_music')}}" class="form-inline my-2 my-lg-0 ml-4">
                            <input name="music_name" class="form-control mr-sm-2" type="search" placeholder="Поиск"
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
                        <a href="{{route('login')}}" class="btn btn-outline-light my-2 my-sm-1 ml LogInButton">Войти</a>
                    </li>

                </ul>
            </div>
        </nav>

    </div>
@endsection

@section('rose')
    <img style="width: 1120px; height: 450px" src="{{ asset('images/rose1.jpg') }}" class="">
@endsection

@section('sidebar')

    <ul class="Sort">
        <p>
            Сортировка <br> по жанру:
        </p>
        @if(isset($genres))
            @foreach($genres as $genre)
                <li><a href="{{route('search_music_by_genre',$genre->id)}}">{{$genre->name}}</a></li>
            @endforeach
        @endif

    </ul>

    <ul class="Sort">
        <p>
            Сортировка по инструменту:
        </p>
        @if(isset($instruments))
            @foreach($instruments as $instrument)
                <li><a href="{{route('search_music_by_instrument', $instrument->id)}}">{{$instrument->name}}</a></li>
            @endforeach
        @endif

    </ul>

@endsection

@section('content')
    <div class="col-sm-8 bg-light" style="display: flex; justify-content: space-around">
        <div style="display: block">
            <h1 class="text-center py-3">Композиторы</h1>

            <form method="get" class="form-inline my-2 my-lg-0 ml-4" action="{{route('find_author')}}">
{{--                @csrf--}}
                <input name="author_name" class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Поиск"
                value="{{isset($author_name_full) ? $author_name_full: ''}}">
                <button class="btn btn-outline-dark my-2 my-sm-1" type="submit">Поиск</button>
            </form>
            <a style="color: #212529" href="{{route('authors')}}">
                <h2 class="py-3">Список композиторов:</h2>
            </a>

            <ul class="Composers" style="list-style-type: circle;">
                @if(count($authors))

                    @foreach ($authors as $author)
                        <li><a href="{{route('author', $author->id)}}">{{ $author->name }}</a></li>
                    @endforeach
                @else
                    <li>По вашему запросу ничего не найдено</li>
                @endif

            </ul>
            <div class="form-row" style="justify-content: center">
                {{$authors->links()}}
            </div>

        </div>
    </div>


@endsection

@section('administration')
    <div class="Administration pt-1">
        <p>
            Администрирование:
        </p>
        <ul style="color: white ">
            <li><a href="{{route('users')}}">Пользователи</a></li>
            <li><a href="{{route('music_tracks_all')}}">Треки</a></li>
            <li><a href="{{route('authors_all')}}">Композиторы</a></li>
        </ul>
    </div>
@endsection
