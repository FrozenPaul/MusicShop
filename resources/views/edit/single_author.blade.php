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

@section('rose')
    <img style="width: 1120px; height: 450px" src="{{ asset('images/rose1.jpg') }}" class="">
@endsection

@section('content')
    <div class="col-md-8  bg-light p-3">
        <h1 class="text-center"> Редактирование автора </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('update_author',$author->id)}}" enctype="multipart/form-data">
            @csrf

            <div class="text-center">
                <img width="250px" src="{{asset($author->picture_path)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Имя</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->name}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Возраст</label>
                <input name="age" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->age}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Место рождения</label>
                <input name="sity_of_birth" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->sity_of_birth}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Дата рождения</label>
                <input name="date_of_birth" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->date_of_birth}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Дата смерти</label>
                <input name="date_of_death" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->date_of_death}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Место смерти</label>
                <input name="place_of_death" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->place_of_death}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Похоронен</label>
                <input name="buried" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->buried}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Профессии</label>
                <input name="jobs" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->jobs}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Жанры</label>
                <input name="genres" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->genres}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Инструменты</label>
                <input name="instruments" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->instruments}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Награды</label>
                <input name="rewards" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                value="{{$author->rewards}}" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Картинка</label>
                <input name="picture_path" type="file" class="form-control-file" id="exampleFormControlFile1"
                       accept="image/jpeg">
                @error('picture_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5" required>
                    {{$author->description}}
                </textarea>

            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{route('delete_author',$author->id)}}" class="btn btn-danger">Удалить</a>
            <a href="{{route('authors_all')}}" class="btn btn-primary">Назад</a>
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
