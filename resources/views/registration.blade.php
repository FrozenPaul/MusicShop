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
        <h1>
            <p class="text-center">Регистрация</p>
        </h1>
        <form class="Login-Registration">
            <div class="form-group">
                <label for="exampleInputEmail1">Введите E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Введите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Подтвердите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
            </div>
            <input type="submit" class="btn btn-dark" value="Сохранить">
            <a href="{{route('login')}}" class="btn btn-dark my-2 my-sm-1 ml ">На страницу авторизации</a>
        </form>
    </div>
@endsection
