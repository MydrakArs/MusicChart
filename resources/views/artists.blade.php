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
    <div class="artist-info">
        <div class="info">
            <div class="image">
                <img src="{{Storage::url($artists->profile_image)}}" alt="{{ $artists->name}}">
            </div>
            <div class="artist-name">
                <h3>{{$artists->name}}</h3>
            </div>
            <div class="count">
                <p>{{$count}} треков</p>
            </div>
        </div>
        <div class="albums">
            @foreach ($album as $alb)
            <div class="album">
                <div class="album-image">
                    <img src="{{Storage::url($alb->album_image)}}" alt="">
                </div>
                <div class="album-name">
                    <a href="{{ url('album', ['id' => $alb->id]) }}">
                        <p>{{$alb->name}}</p>
                    </a>
                    <div class="album-info">
                        <p class="p-hover"> {{ $alb->artist->name }}</p>
                        <p class="">{{ $alb->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="song-list">
        <div class="songs">
                @foreach ($singls as $singl)
                <div class="sound" onclick="playOrPauseSong('{{Storage::url($singl->path)}}', '{{$singl->id}}', '{{$singl->title}}', '{{$singl->artist->name}}' ,'{{Storage::url($singl->lyrics)}}')">
                    <div class="sound-title">
                        <div class="note">
                            <img src="{{URL::asset('/images/musicnote.svg')}}" alt="music-note">
                        </div>
                        <div>
                            <p class="p">{{$singl->title}}</p>
                            <div class="avtors">
                                <a href="{{ url('artist', ['id' => $singl->artist->id]) }}">
                                    <p class="avtor">{{$singl->artist->name}}</p>
                                </a>
                                @if($singl->album_id == null)
                                @endif
                                @if($singl->album_id !== null)
                                <span></span>
                                <a href="{{ url('album', ['id' => $singl->album_id]) }}">
                                    <p class="p">{{$singl->album->name}}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div style="margin-right: 40px;">
                        <p>{{$singl->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                @endforeach
        </div>
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
        background-color: #020115;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .p {
        color: #ffffff;
    }
    .p-hover {
        color: #ffffff;
    }
    .p-hover:hover {
        color: #AB1DF8;
    }
    .info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .artist-info {
        flex: 2.5;
        display: flex;
        flex-direction: column;
    }

    .artist-name {
        margin-top: 10px;
        color: #fff;
    }

    .artist-name h3 {
        font-weight: bold;
        font-size: 24px;
        line-height: 28px;
    }

    .albums {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
        margin-left: 20px;
        overflow-y: auto;
    }

    .album {
        width: 220px;
        height: 240px;
        margin-right: 20px;
    }

    .album-image img {
        max-width: 220px;
        max-height: 170px;
        min-width: 220px;
        min-height: 170px;
        object-fit: cover;
    }

    .album-name {
        font-size: 14px;
        line-height: 16px;
        font-weight: bold;
        margin-top: 20px;
        padding-bottom: 5px;
        cursor: pointer;
    }

    .album-name {
        margin-top: 10px;
    }
    .album-name a {
        color: white;
    }

    .album-name a:hover{
        text-decoration: none;
        color: #AB1DF8;
    }

    .album-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .song-list {
        flex: 3;
        overflow-y: auto;
    }

    .songs {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 100px;
    }

    .sound {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        padding: 5px;
        margin-bottom: 20px;
        border-radius: 7px;
        cursor: pointer;
    }

    .sound:hover {
        background-color: #191c1d;
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
    .image {
        margin-top: 100px;
    }

    .count {
        margin-top: 10px;
        font-size: 14px;
        line-height: 16px;
        font-weight: 500;
    }

    .image img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
    }

    .albums::-webkit-scrollbar-thumb {
        background: #AB1DF8;
        border-radius: 20px;
    }

    .song-list::-webkit-scrollbar {
        width: 4px;
        background-color: transparent;
    }

    .song-list::-webkit-scrollbar-thumb {
        background: #AB1DF8;
        border-radius: 20px;
    }

    .albums::-webkit-scrollbar {
        width: 4px;
        background-color: transparent;
    }
</style>