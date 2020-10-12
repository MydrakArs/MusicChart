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
    <div class="music-content">
        <div class="section">
            <h2>Популярное</h2>
            <p class="p">Самое популярное и прослушиваемое</p>
            <div class="section-cards">
                @foreach ($singls as $singl)
                <div class="section-card">
                    <div class="player-display">
                        <div class="player" id="{{$singl->id}}">
                            <span class="play" id="span">
                                <img src="{{URL::asset('/images/play.svg')}}" id='playbutton{{$singl->id}}' alt="" onclick="playSound('{{Storage::url($singl->path)}}', '{{$singl->id}}', '{{$singl->title}}', '{{$singl->artist->name}}', '{{Storage::url($singl->lyrics)}}')">
                                <img class="no-active pause" src="{{URL::asset('/images/pause.svg')}}" id='stopbutton{{$singl->id}}' alt="" onclick="playSound('{{Storage::url($singl->path)}}', '{{$singl->id}}', '{{$singl->title}}', '{{$singl->artist->name}}', '{{Storage::url($singl->lyrics)}}')">
                            </span>
                        </div>
                        <div class="image">
                            <img src="{{Storage::url($singl->lyrics)}}" alt="{{$singl->artist->name}}">
                        </div>
                    </div>
                    <div class="info">
                        <div class="songs">
                            <p class="name-artist">{{$singl->title}}</p>
                            @if ($mysong->count() == 0)
                            <a href="{{ route('add_song', ['id' => $singl->id]) }}">
                                <span id="add">
                                    <img src="{{URL::asset('/images/Add.svg')}}" alt="add_song">
                                </span>
                            </a>
                            @endif
                            @foreach ($mysong as $my)
                                @if ($loop->first)
                                    @if ($singl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @endif
                                @else 
                                    @if ($singl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @endif
                                @endif
                                @if ($loop->last)
                                    @if ($singl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @else
                                        <a href="{{ route('add_song', ['id' => $singl->id]) }}">
                                            <span id="add">
                                                <img src="{{URL::asset('/images/Add.svg')}}" alt="add_song">
                                            </span>
                                        </a>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="info-song">
                            <a href="{{ url('artist', ['id' => $singl->artist->id]) }}">
                                <p class="name-song">{{ $singl->artist->name }}</p>
                            </a>
                            <p class="date">{{ $singl->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section">
            <h2>Новинки</h2>
            <p class="p">Самые свежие новинки месяца</p>
            <div class="section-cards">
                @foreach ($newsingls as $newsingl)
                <div class="section-card">
                    <div class="player-display">
                        <div class="player" id='new{{$newsingl->id}}'>
                            <span class="play" id="span">
                                <img src="{{URL::asset('/images/play.svg')}}" id='playbuttonnew{{$newsingl->id}}' alt="" onclick="playnewSound('{{Storage::url($newsingl->path)}}', '{{$newsingl->id}}', '{{$newsingl->title}}', '{{$newsingl->artist->name}}', '{{Storage::url($newsingl->lyrics)}}')">
                                <img class="no-active pause" src="{{URL::asset('/images/pause.svg')}}" id='stopbuttonnew{{$newsingl->id}}' alt="" onclick="playnewSound('{{Storage::url($newsingl->path)}}', '{{$newsingl->id}}', '{{$newsingl->title}}', '{{$newsingl->artist->name}}', '{{Storage::url($newsingl->lyrics)}}')">
                            </span>
                        </div>
                        <div class="image">
                            <img src="{{Storage::url($newsingl->lyrics)}}" alt="{{$newsingl->artist->name}}">
                        </div>
                    </div>
                    <div class="info">
                        <div class="songs">
                            <p class="name-artist">{{$newsingl->title}}</p>
                            @if ($mysong->count() == 0)
                            <a href="{{ route('add_song', ['id' => $singl->id]) }}">
                                <span id="add">
                                    <img src="{{URL::asset('/images/Add.svg')}}" alt="add_song">
                                </span>
                            </a>
                            @endif
                            @foreach ($mysong as $my)
                                @if ($loop->first)
                                    @if ($newsingl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @endif
                                @else 
                                    @if ($newsingl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @endif
                                @endif
                                @if ($loop->last)
                                    @if ($newsingl->id == $my->singl_id)
                                        <div class="add-pan">Добавлено</div>
                                        @break
                                    @else
                                        <a href="{{ route('add_song', ['id' => $newsingl->id]) }}">
                                            <span id="add">
                                                <img src="{{URL::asset('/images/Add.svg')}}" alt="add_song">
                                            </span>
                                        </a>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="info-song">
                            <a href="{{ url('artist', ['id' => $newsingl->artist->id]) }}">
                                <p class="name-song">{{ $newsingl->artist->name }}</p>
                            </a>
                            <p class="date">{{ $newsingl->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section">
            <h2>Альбомы</h2>
            <p class="p">Найди для себя что-то интересное</p>
            <div class="section-cards">
                @foreach ($albums as $album)
                <div class="section-card">
                    <div class="image">
                        <img src="{{Storage::url($album->album_image)}}" alt="{{ $album->name }}">
                    </div>
                    <div class="info">
                        <a href="{{ url('album', ['id' => $album->id]) }}">
                            <p class="name-artist hover">{{$album->name}}</p>
                        </a>
                        <div class="info-song">
                            <a href="{{ url('artist', ['id' => $newsingl->artist->id]) }}">
                                <p class="name-song">{{ $album->artist->name }}</p>
                            </a>
                            <p class="date">{{ $album->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="menu">
            <div class="glav">
                <p class="zagolovok">Главная</p>
                <a href="/music">
                    <p class="menu-active">Рекомендации</p>
                </a>
            </div>
            <div class="my-mysic">
                <p class="zagolovok">Моя музыка</p>
                <a href="{{ route('audios', ['id' => Auth::user()->id]) }}">
                    <p>Треки</p>
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
                </a> --}}
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    body {
        background-image: url({{URL::asset('/images/backMusic.png')}});
    }

    .add-pan {
        padding-top: 4px;
    }

    .no-active {
        display: none;
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
    .music-content {
        flex: 6;
        overflow-x: hidden;
    }

    .section {
        padding-top: 30px;
        padding-left: 20px;
    }
    .section h2 {
        font-size: 24px;
        line-height: 28px;
        margin: 0;
        color: #ffffff;
    }

    .p {
        font-size: 12px;
        line-height: 14px;
        color: #AB1DF8;
    }

    .section-cards {
        display: flex;
        margin-top: 20px;
        width: 100%;
        max-width: 1310px;
        margin-right: 40px;
        padding-bottom: 15px;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .section-card {
        width: 220px;
        height: 240px;
        margin-right: 20px;
    }

    .hover:hover {
        color: #AB1DF8;
    }

    .image {
        width: 220px;
        height: 180px;
    }

    .image img {
        min-width: 220px;
        min-height: 180px;
        max-width: 220px;
        max-height: 180px;
        object-fit: cover;
    }

    .add-song {
        position: absolute;
        top: 0;
        right: 0;
    }

    .songs {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .songs span {
        margin-top: 4px;
        cursor: pointer;
    }

    .info {
        margin-top: -10px;
    }
    .info a {
        color: white;
    }

    .info a:hover{
        text-decoration: none;
        color: #AB1DF8;
    }

    p {
        padding: 0;
        margin: 0;
        color: white;
    }

    .section-card {
        text-decoration: none;
    }
    .name-artist {
        font-size: 14px;
        line-height: 16px;
        font-weight: bold;
        margin-top: 20px;
        padding-bottom: 5px;
        width: 80%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .name-song:hover {
        color: #AB1DF8;
    }

    .info-song {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .name-song {
        font-size: 14px;
        line-height: 16px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
        text-overflow: ellipsis;
    }

    .player {
        display: none;
        position: relative;
        z-index: 1;
    }

    .player-display:hover .player {
        display: block;
        cursor: pointer;
    }

    .pause {
        position: absolute;
        top: -30px;
        left: -35px;
    }

    .active {
        display: block;
    }

    .play {
        position: absolute;
        top: 55px;
        left: 75px;
    }

    .player:hover {
        display: block;
    }

    .display {
        display: none;
    }

    .date {
        font-size: 14px;
        line-height: 16px;
    }

    .margin {
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

    .section-cards::-webkit-scrollbar {
        height: 6px;
        background-color: transparent;
    }

    .section-cards::-webkit-scrollbar-thumb {
        background: #AB1DF8;
        border-radius: 20px;
    }

    .music-content::-webkit-scrollbar-thumb {
        background: #AB1DF8;
        border-radius: 20px;
    }

    .music-content::-webkit-scrollbar {
        width: 4px;
        background-color: transparent;
    }
</style>