<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MusicCharts</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->

                    <!-- Branding Image -->
                    <div class="logo-brand">
                        <img class="logo" src="{{URL::asset('/images/logo.png')}}" alt="">
                    </div>
                    <a class="navbar-brand" href="{{ url('home') }}">
                        MusicCharts
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav audio-block">
                        <button><img src="{{URL::asset('/images/backbutton.svg')}}" alt=""></button>
                        <button id="header-play" onclick="headerPlaySound(songPath, songNumber, songName)"><img src="{{URL::asset('/images/playbutton.svg')}}" alt=""></button>
                        <button id="header-pause" class="no-active" onclick="headerPlaySound(songPath, songNumber, songName)"><img src="{{Url::asset('/images/pausebutton.svg')}}" alt=""></button>
                        <button><img src="{{URL::asset('/images/nextbutton.svg')}}" alt=""></button>
                        <div class="audio-title" onclick="openHeader()">
                            {{-- <div class="audio-artist" id="audio-artist">Говно</div>
                             &mdash; --}}
                            <div class="audio-name" id="audio-name"></div>
                        </div>
                        <div class="open-header">
                            <div class="full-header" id="full-header">
                                <div class="headers">
                                    <div class="players">
                                        <button id="players-play" onclick="playOrPause()"><img src="{{URL::asset('/images/play_circle.svg')}}" alt=""></button>
                                        <button class="no-active" id="players-pause" onclick="playOrPause()"><img src="{{URL::asset('/images/pause_circle.svg')}}" alt=""></button>
                                        <button><img src="{{URL::asset('/images/skip_previous.svg')}}" alt="" onclick="previous()"></button>
                                        <button><img src="{{URL::asset('/images/skip_next.svg')}}" alt="" onclick="next()"></button>
                                    </div>
                                    <div class="players-img">
                                        <img src="" alt="" id="players-img">
                                    </div>
                                    <div class="players-name">
                                        <div class="players-song-name" id="songTitle"></div>
                                        <div class="players-artist-name" id="songArtist"><a href=""></a></div>
                                        <div class="players-time" id="currentTime"></div>
                                        <div class="players-time" id="duration">00:00</div>       
                                        <div class="seek-bar">
                                            <input class="timer" type="range" min="0" max="1" step="1" id="songSlider" onchange="seekSong()">
                                        </div>
                                    </div>
                                    <div class="players-volume">
                                        <input class="volum-slider" type="range" min="0" max="1" step="0.01" id="volumeSlider" onchange="adjustVolume()" oninput="adjustVolume()">
                                    </div>
                                </div>
                                <div class="header-scroll">
                                    <div class="header-menu">
                                        <h2>Моя музыка</h2>
                                    </div>
                                    @for($i = 0; $i < count($mysongs); $i++)
                                    <div class="header-songs" id="header-song{{$mysongs[$i]->id}}" onclick="playOrPauseSong('{{Storage::url($mysongs[$i]->path)}}', '{{$mysongs[$i]->id}}', '{{$mysongs[$i]->title}}', '{{$mysongs[$i]->artist->name}}' ,'{{Storage::url($mysongs[$i]->lyrics)}}')">
                                        <div class="header-songs-block">
                                            <div class="header-song-img">
                                                <img src="{{Storage::url($mysongs[$i]->lyrics)}}" alt="">
                                            </div>
                                            <div class="header-song-info">
                                                <div class="header-song-name">{{$mysongs[$i]->title}}</div>
                                                <div class="header-song-artist">{{$mysongs[$i]->artist->name}}</div>
                                            </div>
                                        </div>
                                        <div class="header-song-duration">2:04</div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <search></search>
                            </li>
                            <li class="noty" onclick="showNoty()">
                                <a href="/notifications" class="noty-a">
                                    <img src="{{URL::asset('/images/ringer.svg')}}">
                                    <unreadnots></unreadnots>
                                    <div class="noty-ul" id="noty-ul">
                                        <h2>Ваши уведомления</h2>
                                        <ul>
                                            {{-- @foreach ($nots as $not)
                                                <li>
                                                    {{ $not->data['name'] }} &nbsp; {{ $not->data['message'] }}
                                                </li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </a>
                                <notification :id="{{ Auth::id() }}"></notification>
                                <audio id="noty_audio">
                                    <source src="{{ asset('audio/tone.mp3') }}">
                                </audio>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile', ['id' => Auth::user()->id]) }}">
                                            Мой профиль
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="{{ route('profile.edit') }}">
                                            Настройки
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('/js/noty.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/noty.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/music.js')}}" type="text/javascript"></script>

    <script>
        const songName = localStorage.getItem('song-name');
        const songPath = localStorage.getItem('song-path');
        const songNumber = localStorage.getItem('song-number');
        const songSinger = localStorage.getItem('song-artist');
        const songImages = localStorage.getItem('song-img');
        
        // const songArtist = localStorage.getItem('song-artist');
        // const songImg = localStorage.getItem('song-img');

        document.getElementsByClassName('players-song-name')[0].innerHTML = songName;
        document.getElementsByClassName('audio-name')[0].innerHTML = songName;
        document.getElementsByClassName('players-artist-name')[0].innerHTML = songSinger;
        document.getElementById('players-img').src = songImages;

    </script>

    <style>
        .full-header {
            position: absolute;
            display: none;
            top: 79px;
            left: 0;
            width: 1000px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            max-height: 800px;
            background-color: white;
            color: black;
            overflow: hidden;
        }

        .header-scroll {
            max-height: 720px;
            overflow: auto;
        }

        .background-color {
            background-color: #e9edf1;
        }

        .header-menu {
            display: flex;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 25px;
            flex-direction: column;
            border-bottom: 1px solid black;
        }

        .header-menu h2 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 18px;
        }

        .header-songs {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 7px;
            cursor: pointer;
        }
        
        .header-songs-block {
            display: flex;
            align-items: center;
        }

        .header-songs:hover {
            background-color: #e9edf1;
        }

        .header-song-img {
            width: 55px;
            height: 55px;
            border-radius: 7px;
        }

        .header-song-img img {
            max-width: 55px;
            min-width: 55px;
            height: 55px;
            border-radius: 7px;
            object-fit: cover;
        }

        .header-song-info {
            margin-left: 15px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .header-song-name {
            font-size: 16px;
            width: 190px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-weight: bold;
        }

        .header-song-artist {
            width: 150px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            line-height: 16px;
            font-size: 16px;
            font-weight: 500;
            color: gray;
        }

        .header-song-duration {

        }

        .navbar-header {
            display: flex;
        }

        .logo-brand {
            margin-top: 12px;
            margin-right: 50px;
            max-width: 80px;
        }

        .logo {
            max-width: 80px;
            max-height: 50px;
        }

        .headers {
            display: flex;
            height: 80px;
            padding-left: 15px;
            border-bottom: 1px solid black;
        }

        .players {
            display: flex;
            align-items: center;
        }

        .players button {
            padding: 0;
        }

        .players-img {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .players-img img {
            max-width: 64px;
            min-width: 64px;
            height: 64px;
            border-radius: 7px;
        }

        .players-name {
            position: relative;
            display: flex;
            width: 300px;
            flex-direction: column;
            justify-content: space-around;
            margin-left: 20px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .players-song-name {
            font-size: 16px;
            width: 190px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-weight: bold;
        }

        .players-artist-name {
            width: 150px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            line-height: 16px;          
            font-size: 16px;
            font-weight: 500;
            color: gray;
        }

        .players-artist-name a {
            color: gray;
        }

        .players-time {
            position: absolute;
            right: 0px;
            color: gray;
        }

        .timer {
            -webkit-appearance: none;
            width: 100%;
            height: 3px;
            border-radius: 5px;  
            background: gray;
            outline: none;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .timer:hover .timer::-webkit-slider-thumb {
            display: block;
        } 

        .timer::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 7px;
            height: 7px;
            border-radius: 50%; 
            background: black;
            cursor: pointer;
        }

        .timer::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }
        
        .volum-slider::-ms-slider-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }

        .players-volume {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .active {
            display: block;
        }
        .no-active {
            display: none;
        }
        .audio-block {
            display: flex;
            position: relative;
            align-items: center;
            width: 500px;
            padding-top: 20px;
            padding-bottom: 17px;
            text-overflow: ellipsis;
            margin-left: 30px;
        }

        .audio-block:hover {
            background-color: black;
        }


        .player-buttons {
            display: flex;
            align-items: center;
        }

        .audio-block button {
            background: none;
            border: none;
            outline: none;
            z-index: 1;
        }
        .audio-title {
            position: relative;
            display: flex;
            align-items: center;
            width: inherit;
            text-overflow: ellipsis;
            z-index: 1;
            color: #ffffff;
        }
        .audio-artist {
            margin-left: 20px;
            margin-right: 8px;
            font-size: 16px;
            line-height: 19px;
            color: #ffffff;
        }
        .audio-title .audio-name {
            margin-left: 8px;
            font-size: 16px;
            line-height: 19px;
            color: #ffffff;
        }
    </style>
</body>
</html>