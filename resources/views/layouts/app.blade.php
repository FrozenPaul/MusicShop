<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

    <title>ImagineMusic</title>
</head>

<a id="toTop" class="ReturnButton" href="#menu"><img src="/images/Return.png" alt=""></a>

<body>
    <div class="container">

        <header>

            @yield('header')


        </header>
    </div>
    <div class="container">

        <div class="form-row">
{{--            <div class="rose">--}}
                @yield('rose')


{{--                <img src="{{ asset('images/rose1.jpg') }}" class="img-fluid">--}}
{{--            </div>--}}
        </div>
    </div>



    <div class="container">
        <div class="form-row bgStars">
            <div class="col-md-2" style="border-left: 1px solid grey; ">
                @yield('sidebar')

            </div>

{{--            <div class="col-md-8  bg-light" style="display: flex; justify-content: space-around;">--}}

                @yield('content')


{{--            </div>--}}
            <div class="col-md-2 ">
                <p style="font-family: 'Lobster', cursive;
                    text-align: center; color: white;
                    font-size: 18px;"> Пользователь:</p>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="text-center py-2">
                        <a style="display: block" class="userLink" href="">{{Auth::user()->name}}</a>
                        <a class="btn btn-outline-light"
                           style="font-family: 'Lobster', cursive;"
                           href="{{route('log_out')}}">Выйти</a>
                    </div>
                @else
                    <p style="font-family: 'Lobster', cursive;
                    text-align: center; color: white;
                    font-size: 18px;"> Вы не авторизированы</p>
                @endif

                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    @yield('administration')
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <footer>
            <div class="form-row bg-dark justify-content-center">
                <p>
                    2019 Imagine Music all rights reserved
                </p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {

            $(window).scroll(function () {

                if ($(this).scrollTop() != 0) {

                    $('#toTop').fadeIn();

                } else {

                    $('#toTop').fadeOut();

                }

            });

            $('#toTop').click(function () {

                $('body,html').animate({
                    scrollTop: 0
                }, 800);

            });

        });
    </script>

{{--    <script>--}}
{{--        let tracks = {!! json_encode($music_tracks->toArray()) !!};--}}
{{--        console.log(tracks);--}}
{{--    </script>--}}

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

    @yield('scripts')
</body>


</html>
