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
    <div class="album-info">
        <div class="image">
            <img src="{{Storage::url($album->album_image)}}" alt="">
        </div>
        <div class="album-name">
            <h3>{{$album->name}}</h3>
        </div>
        <div class="artist-name">
            <a href="{{ url('artist', ['id' => $album->artist_id]) }}">
                <h4>{{$album->artist->name }}</h4>
            </a>
        </div>
        <div class="count">
            <p>{{$count}} аудиозаписи</p>
        </div>
    </div>
    <div class="song-list">
        @foreach ($singls as $singl)
        <div class="songs">
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
                        </div>
                    </div>
                </div>
                <div style="margin-right: 40px;">
                    <p>{{$singl->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        @endforeach
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

    .p {
        color: #ffffff;
    }
    .p-hover {
        color: #ffffff;
    }
    .p-hover:hover {
        color: #AB1DF8;
    }

    .album-info {
        flex: 2.5;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .album-name {
        margin-top: 10px;
    }

    .album-name h3 {
        color: #fff;
        font-weight: 800;
    }

    .artist-name {
        margin-top: 10px;
        color: #fff;
    }

    .artist-name a {
        color: #fff;
    }

    .song-list {
        flex: 3;
        margin-top: 70px;
    }

    .songs {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
    }

    .songs p:first-child {
        margin-top: 0;
    }
    .songs p {
        margin-top: 10px;
        margin-bottom: 5px;
    }

    .songs audio:first-child {
        margin-top: 0;
        border: none;
        background: none;
    }
    
    audio::-webkit-media-controls-seek-back-button {
        background-color: #020115;
    }
    
    .songs audio {
        margin-top: 10px;
        outline: none;
        background-color: #020115;
    }

    .sound {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        padding: 5px;
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
    }

    .image img {
        width: 300px;
        height: 300px;
        object-fit: cover;
    }
</style>