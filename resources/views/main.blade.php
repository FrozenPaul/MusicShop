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
                        Сортировка <br>по жанру:
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
    <div class="rose">
        <h3 class="Writer px-3 pb-3" style="color: white; font-family: 'Lobster', cursive;">
            Последние добавленные :
        </h3>

        <div class="slider">
            <div class="slider__wrapper">
    {{--            {{$last_tracks[0]->id}}--}}
                @if(isset($last_tracks))
                    @foreach($last_tracks as $last_track)
                        <div class="slider__item">
                            <div class="rapid_card px-3">
                                <div class="raw">
                                    <img height="120px" src="{{$last_track->picture_path}}" class="" alt="...">
                                    <a style="font-family: 'Lobster', cursive;" href="{{route('single_track', $last_track->id)}}">
                                        <h5 class="card-title mb-0">{{$last_track->name}}</h5>
                                    </a>
                                    <p style="color: orange;">
                                        <span>Дата: </span>{{$last_track->created_at->format('Y-m-d')}}
                                    </p>
                                </div>


                            </div>

                        </div>
                    @endforeach
                @endif

            </div>
            <a class="slider__control slider__control_left" href="#" role="button"></a>
            <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
        </div>

        <h3 class="p-3" style="color: white; font-family: 'Lobster', cursive;">
            Рейтинг лучших :
        </h3>

        <div class="slider_1">
            <div class="slider__wrapper_1">
                {{--            {{$last_tracks[0]->id}}--}}
                @if(isset($rating_tracks))
                    @foreach($rating_tracks as $rating_track)
                        <div class="slider__item_1">
                            <div class="rapid_card px-3">
                                <div>
                                    <img height="120px" src="{{$rating_track->picture_path}}" class="" alt="...">
                                    <a style="font-family: 'Lobster', cursive;" href="{{route('single_track', $rating_track->id)}}">
                                        <h5 class="card-title mb-0">{{$rating_track->name}}</h5>
                                    </a>
                                    <p style="color: orange;">
                                        <span>Рейтинг: </span>{{$rating_track->rating}}
                                    </p>
                                </div>


                            </div>

                        </div>
                    @endforeach
                @endif

            </div>
            <a class="slider__control_1 slider__control_left_1" href="#" role="button"></a>
            <a class="slider__control_1 slider__control_right_1 slider__control_show_1" href="#" role="button"></a>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-8  bg-light">

        @if(isset($search_tag))
            <h2 style="font-family: 'Lobster', cursive;">{{$search_tag}}</h2>
        @endif

        <div class="form-row pt-3" style="justify-content: center">
            {{$music_tracks->links()}}
        </div>

        <div style="display: flex; justify-content: space-around;">
            <div class="form-row" style="padding: 0 1rem 1rem 1rem;">
                <div class="row" style="justify-content: space-around;">

                    @if(isset($music_tracks) && count($music_tracks) > 0)
                        @foreach($music_tracks as $music_track)
                            <div class="card">
                                <div class="Image">
                                    <a class="imageReference" href="{{$music_track->picture_path}}" data-fancybox="gallery">
                                        <img src="{{$music_track->picture_path}}" class="img-fluid" alt="...">
                                    </a>
                                    <div class="ButtonBlock">
                                        <a href="{{route('download',$music_track->id)}}" class="downloadButton imageReference" >
                                            <img src="/images/download-icon.png" alt="">
                                        </a>
                                        <a href="{{route('single_track', $music_track->id)}}" class="downloadButton">
                                            <img src="/images/Eye.png " alt="">
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <a href="{{route('single_track', $music_track->id)}}">
                                        <h5 class="card-title">{{$music_track->name}}</h5>
                                    </a>
                                    <p class="card-text">
                                        <span>Автор:</span> <a href="{{route('author',$music_track->author_id)}}">
                                            {{\App\Author::find($music_track->author_id)->name}}
                                        </a><br>
                                        <span>Жанр:</span> {{\App\Genre::find($music_track->genre_id)->name}} </br>
                                        <span>Инструмент:</span> {{\App\Instrument::find($music_track->instrument_id)->name}} </br>
                                        <span>Рейтинг:</span> {{$music_track->rating}} </br>

                                            <a href="{{route('download',$music_track->id)}}" class="btn btn-success mt-3 text-white">Скачать</a>


                                    </p>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <h2 style="font-family: 'Lobster', cursive;">Ничего не найдено</h2>
                    @endif

                </div>
            </div>
        </div>

        <div class="form-row" style="justify-content: center">
            {{$music_tracks->links()}}
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

@section('scripts')

    {{--    //first slider--}}
    <script>
        'use strict';
        var multiItemSlider = (function () {
            return function (selector, config) {
                var
                    _mainElement = document.querySelector(selector), // основный элемент блока
                    _sliderWrapper = _mainElement.querySelector('.slider__wrapper'), // обертка для .slider-item
                    _sliderItems = _mainElement.querySelectorAll('.slider__item'), // элементы (.slider-item)
                    _sliderControls = _mainElement.querySelectorAll('.slider__control'), // элементы управления
                    _sliderControlLeft = _mainElement.querySelector('.slider__control_left'), // кнопка "LEFT"
                    _sliderControlRight = _mainElement.querySelector('.slider__control_right'), // кнопка "RIGHT"
                    _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ширина обёртки
                    _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ширина одного элемента
                    _positionLeftItem = 0, // позиция левого активного элемента
                    _transform = 0, // значение транфсофрмации .slider_wrapper
                    _step = _itemWidth / _wrapperWidth * 100, // величина шага (для трансформации)
                    _items = []; // массив элементов
                // наполнение массива _items
                _sliderItems.forEach(function (item, index) {
                    _items.push({ item: item, position: index, transform: 0 });
                });

                var position = {
                    getMin: 0,
                    getMax: _items.length - 1,
                }

                var _transformItem = function (direction) {
                    if (direction === 'right') {
                        if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) >= position.getMax) {
                            return;
                        }
                        if (!_sliderControlLeft.classList.contains('slider__control_show')) {
                            _sliderControlLeft.classList.add('slider__control_show');
                        }
                        if (_sliderControlRight.classList.contains('slider__control_show') && (_positionLeftItem + _wrapperWidth / _itemWidth) >= position.getMax) {
                            _sliderControlRight.classList.remove('slider__control_show');
                        }
                        _positionLeftItem++;
                        _transform -= _step;
                    }
                    if (direction === 'left') {
                        if (_positionLeftItem <= position.getMin) {
                            return;
                        }
                        if (!_sliderControlRight.classList.contains('slider__control_show')) {
                            _sliderControlRight.classList.add('slider__control_show');
                        }
                        if (_sliderControlLeft.classList.contains('slider__control_show') && _positionLeftItem - 1 <= position.getMin) {
                            _sliderControlLeft.classList.remove('slider__control_show');
                        }
                        _positionLeftItem--;
                        _transform += _step;
                    }
                    _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
                }

                // обработчик события click для кнопок "назад" и "вперед"
                var _controlClick = function (e) {
                    if (e.target.classList.contains('slider__control')) {
                        e.preventDefault();
                        var direction = e.target.classList.contains('slider__control_right') ? 'right' : 'left';
                        _transformItem(direction);
                    }
                };

                var _setUpListeners = function () {
                    // добавление к кнопкам "назад" и "вперед" обрботчика _controlClick для событя click
                    _sliderControls.forEach(function (item) {
                        item.addEventListener('click', _controlClick);
                    });
                }

                // инициализация
                _setUpListeners();

                return {
                    right: function () { // метод right
                        _transformItem('right');
                    },
                    left: function () { // метод left
                        _transformItem('left');
                    }
                }

            }
        }());

        var slider = multiItemSlider('.slider')

    </script>

    {{--    //second slider--}}
    <script>
        'use strict';
        var multiItemSlider = (function () {
            return function (selector, config) {
                var
                    _mainElement = document.querySelector(selector), // основный элемент блока
                    _sliderWrapper = _mainElement.querySelector('.slider__wrapper_1'), // обертка для .slider-item
                    _sliderItems = _mainElement.querySelectorAll('.slider__item_1'), // элементы (.slider-item)
                    _sliderControls = _mainElement.querySelectorAll('.slider__control_1'), // элементы управления
                    _sliderControlLeft = _mainElement.querySelector('.slider__control_left_1'), // кнопка "LEFT"
                    _sliderControlRight = _mainElement.querySelector('.slider__control_right_1'), // кнопка "RIGHT"
                    _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width), // ширина обёртки
                    _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width), // ширина одного элемента
                    _positionLeftItem = 0, // позиция левого активного элемента
                    _transform = 0, // значение транфсофрмации .slider_wrapper
                    _step = _itemWidth / _wrapperWidth * 100, // величина шага (для трансформации)
                    _items = []; // массив элементов
                // наполнение массива _items
                _sliderItems.forEach(function (item, index) {
                    _items.push({ item: item, position: index, transform: 0 });
                });

                var position = {
                    getMin: 0,
                    getMax: _items.length - 1,
                }

                var _transformItem = function (direction) {
                    if (direction === 'right') {
                        if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) >= position.getMax) {
                            return;
                        }
                        if (!_sliderControlLeft.classList.contains('slider__control_show_1')) {
                            _sliderControlLeft.classList.add('slider__control_show_1');
                        }
                        if (_sliderControlRight.classList.contains('slider__control_show_1') && (_positionLeftItem + _wrapperWidth / _itemWidth) >= position.getMax) {
                            _sliderControlRight.classList.remove('slider__control_show_1');
                        }
                        _positionLeftItem++;
                        _transform -= _step;
                    }
                    if (direction === 'left') {
                        if (_positionLeftItem <= position.getMin) {
                            return;
                        }
                        if (!_sliderControlRight.classList.contains('slider__control_show_1')) {
                            _sliderControlRight.classList.add('slider__control_show_1');
                        }
                        if (_sliderControlLeft.classList.contains('slider__control_show_1') && _positionLeftItem - 1 <= position.getMin) {
                            _sliderControlLeft.classList.remove('slider__control_show_1');
                        }
                        _positionLeftItem--;
                        _transform += _step;
                    }
                    _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
                }

                // обработчик события click для кнопок "назад" и "вперед"
                var _controlClick = function (e) {
                    if (e.target.classList.contains('slider__control_1')) {
                        e.preventDefault();
                        var direction = e.target.classList.contains('slider__control_right_1') ? 'right' : 'left';
                        _transformItem(direction);
                    }
                };

                var _setUpListeners = function () {
                    // добавление к кнопкам "назад" и "вперед" обрботчика _controlClick для событя click
                    _sliderControls.forEach(function (item) {
                        item.addEventListener('click', _controlClick);
                    });
                }

                // инициализация
                _setUpListeners();

                return {
                    right: function () { // метод right
                        _transformItem('right');
                    },
                    left: function () { // метод left
                        _transformItem('left');
                    }
                }

            }
        }());

        var slider = multiItemSlider('.slider_1')

    </script>
@endsection
