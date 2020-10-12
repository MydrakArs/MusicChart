@extends('layouts.header')

@section('content')
<div class="main-menu">
    <ul class="main-menu-ul">
        <a href="{{ route('profile', ['id' => Auth::user()->id]) }}">
            <li>
                <img src="{{URL::asset('/images/person.svg')}}">
            </li>
        </a>
        <a class="music-block" href="{{ url('music') }}">
            <li>
                <img src="{{URL::asset('/images/music1.svg')}}">
            </li>
        </a>
        <a href="{{ route('friends', ['id' => Auth::user()->id]) }}">
            <li>
                <img src="{{URL::asset('/images/friend.svg')}}">
            </li>
        </a>
        <a href="{{ url('home') }}">
            <li>
                <img src="{{URL::asset('/images/message.svg')}}">
            </li>
        </a>
    </ul>
    <div class="music">
        <p>Музыка</p>
    </div>
</div>

<div class="content">
    <div class="songs">
        <div class="header">
            <h2>Моя музыка</h2>
        </div>
        <div class="songs-content">
            @for($i = 0; $i < count($mysong); $i++)
                <div class="sound" onclick="playOrPauseSong('{{Storage::url($mysong[$i]->path)}}', '{{$mysong[$i]->id}}', '{{$mysong[$i]->title}}', '{{$mysong[$i]->artist->name}}' ,'{{Storage::url($mysong[$i]->lyrics)}}')">
                    <div class="sound-title">
                        <div class="note">
                            <img src="{{URL::asset('/images/musicnote.svg')}}" alt="music-note">
                        </div>
                        <div>
                            <p>{{$mysong[$i]->title}}</p>
                            <div class="avtors">
                                <a href="">
                                    <p class="avtor">{{$mysong[$i]->artist->name}}</p>
                                </a>
                                @if($mysong[$i]->album_id == null)
                                @endif
                                @if($mysong[$i]->album_id !== null)
                                <span></span>   
                                <a href="{{ url('album', ['id' => $mysong[$i]->album_id]) }}">
                                    <p class="album">{{$mysong[$i]->album->name}}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        2:04
                    </div>
                </div>
            @endfor
            <div class="music-friend">
                <p>test</p>
            </div>
        </div>
    </div>

    <div class="menu">
        <div class="glav">
            <p class="zagolovok">Главная</p>
            <a href="/music">
                <p>Рекомендации</p>
            </a>
        </div>
        <div class="my-mysic">
            <p class="zagolovok">Моя музыка</p>
            <a href="{{ route('audios', ['id' => Auth::user()->id]) }}">
                <p class="menu-active">Треки</p>
            </a>
            {{-- <a href="">
                <p>Альбомы</p>
            </a>
            <a href="/music/artists" :artists="artists">
                <p>Исполнители</p>
            </a>
            <a href="">
                <p>Плейлисты</p>
            </a> --}}
        </div>
        {{-- <div class="friend-music">
            <p class="zagolovok">Музыка друзей</p>
            <a href="">
                <p>Недавнее</p>
            </a>
        </div> --}}
    </div>
</div>
@endsection

<style>
    body {
        background-image: url({{URL::asset('/images/backMusic.png')}});
    }
    .content {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        width: 172vh;
        height: 76.6vh;
        justify-content: space-around;  
        background-color: #020115;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .songs {
        flex: 6;
        overflow: auto;
        margin-left: 40px;
    }
    .header {
        width: inherit;
        margin-bottom: 40px;
    }
    .header h2 {
        font-size: 24px;
        line-height: 28px;
        color: #ffffff;
    }
    .songs-content {
    }
    .sound {
        display: flex;
        flex: 2;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        margin-bottom: 20px;
        margin-right: 100px;
        padding: 5px;
        border-radius: 7px;
        cursor: pointer;
    }
    .sound:hover {
        background-color: #191c1d;
    }
    .note {
        margin-right: 10px;
    }
    .note img {
        width: 25px;
        height: 25px;
    }

    .avtors {
        display: flex;
        align-items: center;
    }

    .avtors span {
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background-color: #ffffff;
        margin-left: 7px;
        margin-right: 7px;
    }

    .avtors p {
        padding: 0;
    }

    .avtors .avtor {
        max-width: 300px;
        font-size: 14px;
        line-height: 16px;
        color: #ffffff
    }

    .avtors .album {
        max-width: 300px;
        font-size: 14px;
        line-height: 16px;
        color: #EAE1E1;
    }

    .sound-title {
        width: 500px;
        font-size: 16px;
        line-height: 19px;
        display: flex;
        align-items: center;
    }

    .sound-title p {
        margin: 0;
    }
    .music-friend {
        width: 100%;
        display: none;
        flex: 1;
        background-color: aquamarine;
    }
    .menu {
        flex: 1.5;
        max-height: 100vh;
        border-Left: 1px solid #AB1DF8;
    }

    .menu p {
        margin-bottom: 5px;
    }

    .menu a {
        text-decoration: none;
        color: #ffffff;
    }

    .menu a:hover{
        color: #AB1DF8;
    }

    .menu .zagolovok {
        font-size: 16px;
        font-weight: normal;
        line-height: 50px;
        text-align: left;
        text-transform: uppercase;
        margin: 0;
        color: #ffffff;
    }

    .menu .glav {
        margin-top: 40px;
        margin-left: 20px;
        margin-bottom: 10px;
        }

    .menu .my-mysic {
        margin-left: 20px;
        margin-bottom: 10px;
    }

    .menu .friend-music {
        margin-left: 20px;
        margin-bottom: 10px;
    }

    .menu-active {
        color: #AB1DF8;
    }
</style>