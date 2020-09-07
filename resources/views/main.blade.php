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

@section('sidebar')
                <ul class="Sort">
                    <p>Сортировка:</p>
                    <li>
                        <a href="#">Дата загрузки</a>
                    </li>
                    <li>
                        <a href="#">Количество комментариев</a>
                    </li>
                    <li>
                        <a href="#">Пользовательский рейтинг</a>
                    </li>

                </ul>

                <ul class="Sort">
                    <p>
                        Сортировка по жанру:
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
                            <li><a href="#">{{$instrument->name}}</a></li>
                        @endforeach
                    @endif

                </ul>

@endsection

@section('content')
    <div class="col-md-8  bg-light" style="display: flex; justify-content: space-around;">
        <div class="form-row" style="padding: 1rem;">
            <div class="row" style="justify-content: space-around;">

                @foreach($music_tracks as $music_track)
                    <div class="card">
                        <div class="Image">
                            <a class="imageReference" href="{{$music_track->picture_path}}" data-fancybox="gallery">
                                <img src="{{$music_track->picture_path}}" class="img-fluid" alt="...">
                            </a>
                            <div class="ButtonBlock">
                                <a href="" class="downloadButton">
                                    <img src="/images/download-icon.png" alt="">
                                </a>
                                <a href="" class="downloadButton">
                                    <img src="/images/Eye.png " alt="">
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">{{$music_track->name}}</h5>
                            </a>
                            <p class="card-text">
                                <span>Автор:</span> <a href="{{route('author',$music_track->author_id)}}">
                                    {{\App\Author::find($music_track->author_id)->name}}
                                </a></br>
                                <span>Инструмент:</span> {{\App\Instrument::find($music_track->instrument_id)->name}} </br>
                                <button type="button" class="btn btn-success mt-3">Скачать</button>
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>
{{--                {{$music_tracks->links()}}--}}
        </div>
    </div>
@endsection

@section('administration')
    <div class="Administration pt-1">
        <p>
            Администрирование:
        </p>
        <ul style="color: white ">
            <li><a href="">Пользователи</a></li>
            <li><a href="">Треки</a></li>
            <li><a href="">Композиторы</a></li>
        </ul>
    </div>
@endsection
