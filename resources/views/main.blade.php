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
                        Сортировка по инструменту:
                    </p>
                    <li><a href="#">Фортепиано</a></li>
                    <li><a href="#">Гитара</a></li>
                    <li><a href="#">Скрипка</a></li>
                </ul>

@endsection

@section('content')
    <div class="form-row" style="padding: 1rem;">

                    <div class="col-lg-4 col-md-6 bg-light" style="margin-bottom: 20px;">
                        <div class="card">
                            <div class="Image">
                                <a class="imageReference" href="images/prelude in G minor rachmaninoff.jpg"
                                    data-fancybox="gallery">
                                    <img src="images/prelude in G minor rachmaninoff.jpg" class="img-fluid" alt="...">
                                </a>
                                <div class="ButtonBlock">
                                    <a href="" class="downloadButton">
                                        <img src="/images/download-icon.png" alt="">
                                    </a>
                                    <a href="/musicInformation.html" class="downloadButton">
                                        <img src="/images/Eye.png " alt="">
                                    </a>
                                </div>

                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><a href="musicInformation.html">Prelude in G minor</a></h5>
                                <p class="card-text">
                                    <span>Автор:</span> <a href="composer.html">Сергей Васильевич Рахманинов</a></br>
                                    <span>Инструмент:</span> фортепиано, рояль </br>
                                    <span>Скачать:</span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                        <div class="card">
                            <div class="Image">
                                <a class="imageReference" href="images/glassySky.png" data-fancybox="gallery">
                                    <img src="images/glassySky.png" class="img-fluid" alt="...">
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
                                    <h5 class="card-title">Glassy Sky</h5>
                                </a>
                                <p class="card-text">
                                    <span>Автор:</span> <a href="">Ytaka Yamada</a></br>
                                    <span>Инструмент:</span> фортепиано, рояль </br>
                                    <span>Скачать:</span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                        <div class="card">
                            <div class="Image">
                                <a class="imageReference" href="images/Departures.png" data-fancybox="gallery">
                                    <img src="images/Departures.png" class="img-fluid" alt="...">
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
                                    <h5 class="card-title">Departures</h5>
                                </a>
                                <p class="card-text">
                                    <span>Автор:</span> <a href="composer.html">arranged by Animenz</a></br>
                                    <span>Инструмент:</span> фортепиано, рояль </br>
                                    <span>Скачать:</span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" style="margin-bottom: 20px;">
                        <div class="card">
                            <div class="Image">
                                <a class="imageReference" href="images/Departures.png" data-fancybox="gallery">
                                    <img src="images/Departures.png" class="img-fluid" alt="...">
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
                                    <h5 class="card-title">Departures</h5>
                                </a>
                                <p class="card-text">
                                    <span>Автор:</span> <a href="composer.html">arranged by Animenz</a></br>
                                    <span>Инструмент:</span> фортепиано, рояль </br>
                                    <span>Скачать:</span>
                                </p>
                            </div>

                        </div>
                    </div>
    </div>
@endsection
