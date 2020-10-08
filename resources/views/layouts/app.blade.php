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
            @yield('rose')
        </div>
    </div>



    <div class="container">
        <div class="form-row bgStars">
            <div class="col-md-2" style="border-left: 1px solid grey; ">
                @yield('sidebar')

            </div>

                @yield('content')

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

    @yield('scripts')
</body>


</html>
