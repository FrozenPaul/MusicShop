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
                <li><a href="{{route('search_music_by_instrument', $instrument->id)}}">{{$instrument->name}}</a></li>
            @endforeach
        @endif

    </ul>

@endsection

@section('content')
    <div class="col-md-8  bg-light p-3">
        <h1 class="text-center"> Добавление произведения </h1>

        <form method="post" action="{{route('save_music_track')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Название</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Автор</label>
                <select name="author" class="form-control" id="exampleFormControlSelect1">
                    @if(isset($authors))
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Жанр</label>
                <select name="genre" class="form-control" id="exampleFormControlSelect1">
                    @if(isset($genres))
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Инструмент</label>
                <select name="instrument" class="form-control" id="exampleFormControlSelect1">
                    @if(isset($instruments))
                        @foreach($instruments as $instrument)
                            <option value="{{$instrument->id}}">{{$instrument->name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Год написания</label>
                <input name="year" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Cложность</label>
                <input name="complexity" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Ссылка на видео с исполнением</label>
                <input name="link" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Картинка</label>
                <input name="picture_path" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Ноты</label>
                <input name="notes_path" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{route('music_tracks_all')}}" class="btn btn-primary">Назад</a>
        </form>

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
