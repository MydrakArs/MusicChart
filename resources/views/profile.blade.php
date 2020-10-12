@extends('layouts.header')

@section('content')
<div class="main-menu">
    <ul class="main-menu-ul">
        <a class="profile-block" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
            <li>
                <img src="{{URL::asset('/images/person.svg')}}">
            </li>
        </a>
        <a href="{{ url('music') }}">
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
    <div class="profile">
        <p>Профиль</p>
    </div>
</div>
<div class="content">
    <div class="profile-content">
        <div class="header">
            <div class="info-profile">
                <div class="avatar">
                    <img src="{{Storage::url($user->profile_image)}}" alt="">
                    <div class="info">
                        <p>{{ $user->name }} {{ $user->surname}} &emsp; &mdash; &emsp; <span style="color: #00D4FF;">{{ $user->artist->name }}</span></p>
                        @if(Cache::has('user-is-online-' . $user->id))
                            <p style="color: #9F9E9E">Online</p>
                        @else
                            <p style="color: #9F9E9E">Offline</p>
                        @endif
                        <p>{{ $user->profile->location}}</p>
                        <p>Друзья: <span style="color: #9F9E9E">{{ $countf }}</span></p>
                    </div>
                </div>
                <div class="buttons">
                    @if(Auth::id() == $user->id)
                    <div class="button">
                        <a href="{{ url('/profile/add/profile') }}">Опубликовать</a>
                    </div>
                    @endif
                    @if(Auth::id() !== $user->id)
                    <Profilefriend :profile_user_id="{{ $user->id }}"></Profilefriend>
                    @endif
                </div>
            </div>
            <div class="about">
                <p>{{ $user->profile->about}}</p>
            </div>
        </div>
        <div class="fead-header">
            @if(Auth::id() !== $user->id)
                <h2 style="width: 300px">Публикации пользователя</h2>
            @endif
            @if(Auth::id() == $user->id)
                <h2 style="width: 200px">Мои публикации</h2>
            @endif
            </div>
        <div class="fead">
            <div class="publish">
                @foreach ($singls as $singl)
                    <div class="sound" onclick="playOrPauseSong('{{Storage::url($singl->path)}}', '{{$singl->id}}', '{{$singl->title}}', '{{$singl->artist->name}}' ,'{{Storage::url($singl->lyrics)}}')">
                        <div class="sound-title">
                            <div class="note">
                                <img src="{{URL::asset('/images/musicnote.svg')}}" alt="music-note">
                            </div>
                            <div>
                                <p>{{$singl->title}}</p>
                                <div class="avtors">
                                    <a href="{{ url('artist', ['id' => $singl->artist->id]) }}">
                                        <p class="avtor">{{$singl->artist->name}}</p>
                                    </a>
                                    @if($singl->album_id == null)
                                    @endif
                                    @if($singl->album_id !== null)
                                    <span></span>
                                    <a href="{{ url('album', ['id' => $singl->album_id]) }}">
                                        <p class="album">{{$singl->album->name}}</p>
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
</div>

@endsection

<style>
body {
        background-image: url({{URL::asset('/images/backProfile.png')}});
}

p {
    color: #ffffff;
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

.content {
    display: flex;
    justify-content: space-between;
    margin-left: auto;
    margin-right: auto;
    width: 172vh;
    height: 76.6vh;
    background-color: #020115;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}

.profile-content {
    width: inherit;
    display: flex;
    flex-direction: column;
}

.header {
    width: inherit;
    margin-top: 40px;
    margin-left: 40px;
}

.fead {
    margin-left: 40px;
    overflow-y: auto;
}

.buttons {
    margin-top: 40px;
    margin-right: 70px;
}

.fead-header {
    margin-left: 40px;
    margin-bottom: 20px;
}

.fead-header h2 {
    font-size: 24px;
    line-height: 28px;
    color: #ffffff;
    cursor: pointer;
    border-bottom: 1px solid #00D4FF;
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

.avatar {
    display: flex;
}

.about {
    margin-top: 20px;
    width: 400px;
    font-size: 14px;
    line-height: 18px;
    color: #ffffff;
}

.button {
    display: flex;
    align-items: center;
    width: 152px;
    height: 38px;
    text-align: center;
    vertical-align: center;
    background: linear-gradient(105.5deg, #00D4FF 3.38%, #150E91 94.16%);
    border-radius: 10px;
}

.button a {
    color: #ffffff;
    margin: auto;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 12px;
    line-height: 14px;
    letter-spacing: 0.01em;
    text-decoration: none;
}

.button a:hover {
    opacity: .5;
}

.button a:-webkit-any-link {
    color: #ffffff;
    cursor: pointer;
    text-decoration: none;
}

.fead::-webkit-scrollbar-thumb {
    background: #00D4FF;
    border-radius: 20px;
}

.fead::-webkit-scrollbar {
    width: 4px;
    background-color: transparent;
}
</style>