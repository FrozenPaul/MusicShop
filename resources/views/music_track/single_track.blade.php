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
    <div class="col-md-8  bg-light">
        <div class="row py-4">
            <div class="col-md-4 ">
                <a href="{{$music_track->picture_path}}" data-fancybox="gallery">
                    <img src="{{$music_track->picture_path}}" class="img-fluid">
                </a>
            </div>
            <div class="col-md">
                <div class="Composer">
                    <span>Название произведения:</span> {{$music_track->name}} </br>
                    <span>Композитор:</span><a href="{{route('author',\App\Author::find($music_track->author_id)->id)}}"><i> {{\App\Author::find($music_track->author_id)->name}}</i></a>
                    </br>
                    <span>Год написания:</span> {{$music_track->year}}</br>
                    <span>Жанр:</span> {{\App\Genre::find($music_track->genre_id)->name}}</br>
                    <span>Инструмент:</span> {{\App\Instrument::find($music_track->instrument_id)->name}}</br>
{{--                    <span>Количество страниц:</span> 6 </br>--}}
                    <span>Сложность:</span> {{$music_track->complexity}} </br>
                    <span>Глобальный рейтинг:</span> {{$music_track->rating}} </br>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="Composer">
                            <span>Ваш рейтинг:</span>
                        </div>

                        <div class="stars raw">
                            <form method="post" id="addStar" action="{{route('save_rating')}}">
                                @csrf
                                <input name="music_track_id" type="hidden" value="{{$music_track->id}}">
                                <input class="star star-5" id="star-5" type="radio" name="star" value="5"
                                    {{isset($rating) && $rating->rating == 5 ? 'checked': ''}}/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" value="4"
                                    {{isset($rating) && $rating->rating == 4 ? 'checked': ''}}/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" value="3"
                                    {{isset($rating) && $rating->rating == 3 ? 'checked': ''}}/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" value="2"
                                    {{isset($rating) && $rating->rating == 2 ? 'checked': ''}}/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star" value="1"
                                    {{isset($rating) && $rating->rating == 1 ? 'checked': ''}}/>
                                <label class="star star-1" for="star-1"></label>
                                {{--                        <input type="submit" class="btn btn-success" value="Отправить">--}}
                            </form>
                        </div>
                    @endif

                    <div class="">
                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                            <a href="{{{route('edit_music_track',$music_track->id)}}}" class="btn btn-info " style="color: white">Редактировать</a>
                        @endif
                        <a href="{{route('download',$music_track->id)}}" class="btn btn-success text-white ">Скачать</a>
                    </div>
                </div>

            </div>

        </div>
        <h3 class="text-center">Описание:</h3>
        <p class="Composer px-2">
            {{$music_track->description}}
        </p>
        <div class="text-center">
            <h4>Ноты:</h4>
            <iframe
                src="{{ asset($music_track->notes_path) }}"
                width="600px" height="500px"></iframe>

            <h4>Пример исполнения:</h4>
            <iframe width="560" height="315"
                    src="{{$music_track->link}}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <h3>Комментарии: ( {{isset($comments)? count($comments) : 0}} )</h3>
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="text-center">
                <form style="height: 90px" action="{{route('add_comment',$music_track->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                    <textarea style="width: 80%" name="comment" rows="3"></textarea>
                    <button class="btn btn-success" style="height: 78px; margin-bottom: 69px;" type="submit">Добавить</button>
                </form>
            </div>
        @endif
        @if(isset($comments))
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Комментарий</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <th scope="row"></th>
                            <td>{{\App\User::find($comment->user_id)->name}}</td>
                            <td>{{$comment->text}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

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
    <script>
        $('#addStar').change('.star', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                type: 'POST',
                cache: false,
                dataType: 'JSON',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
