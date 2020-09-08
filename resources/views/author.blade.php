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
                        <form method="post" action="{{route('search_music')}}" class="form-inline my-2 my-lg-0 ml-4">
                            @csrf
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

@section('content')
    <div class="col-sm-8 bg-light">
        <h1 class="text-center">{{$author->name}}</h1>
        <div class="form-row">
            <div class="col-md-4 ComposerImage">
                <a href="{{asset($author->picture_path)}}" data-fancybox="gallery">
                    <img src="{{ asset($author->picture_path) }}" class="img-fluid">
                </a>
            </div>
            <div class="col-md ml-1">
                <p class="Composer">
                    <span>Полное имя:</span> {{$author->name}}</br>
                    <span>Дата рождения:</span> {{$author->date_of_birth}} </br>
                    <span>Место рождения:</span> {{$author->sity_of_birth}}</br>
                    <span>Дата смерти:</span> {{$author->date_of_death}}</br>
                    <span>Место смерти:</span> {{$author->place_of_death}}</br>
                    <span>Похоронен:</span>{{$author->buried}} </br>
                    <span>Профессии:</span> {{$author->jobs}}</br>
                    <span>Инструменты:</span> {{$author->instruments}} </br>
                    <span>Жанры:</span> {{$author->genres}}</br>
                    <span>Награды:</span> {{$author->rewards}}</br>
                </p>
            </div>
        </div>
        <p class="Composer">
            &nbsp&nbsp&nbsp&nbsp{{ $author->description}}
        </p>
    </div>
@endsection
