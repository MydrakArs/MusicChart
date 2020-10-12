@extends('layouts.header')

@section('content')
<div class="main-menu">
    <ul class="main-menu-ul">
        <a href="{{ route('profile', ['id' => Auth::user()->id]) }}">
            <li>
                <img src="{{URL::asset('/images/person.svg')}}">
            </li>
        </a>
        <a href="{{ url('music') }}">
            <li>
                <img src="{{URL::asset('/images/music1.svg')}}">
            </li>
        </a>
        <a class="friend-block" href="{{ route('friends', ['id' => Auth::user()->id]) }}">
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
    <div class="friend">
        <p>Друзья</p>
    </div>
</div>
{{-- <Friends :user="{{ auth()->user() }}"></Friends> --}}
<div class="content">
    <div class="friends-list">
        {{-- <div class="search">
            <input type="search" placeholder="Поиск новых друзей...">
        </div> --}}
        <ul class="friend-ul">
            @foreach ($friends as $friend)
            <li class="friend-li">
                <div class="avatar">
                    <img src="{{Storage::url($friend->profile_image)}}">
                </div>
                <div class="contact">
                    <a class="contact-a" href="{{ route('profile', ['id' => $friend->requester]) }}">
                        <p class="name">{{$friend->name}} {{$friend->surname}}</p>
                    </a>
                    @if(Cache::has('user-is-online-' . $friend->requester))
                        <p style="color: #9F9E9E">Online</p>
                    @else
                        <p style="color: #9F9E9E">Offline</p>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="menu">
        {{-- <div class="category">
            <p class="all-friend">Все друзья</p>
            <p class="online-friend">Друзья онлайн</p>
        </div> --}}
        <div class="glav">
            <p class="zagolovok">Входящие заявки</p>
            <ul>
                @foreach ($incoming as $incom)
                @if(Auth::id() !== $incom->requester && Auth::id() == $incom->user_requested)
                <li class="list">
                    <div class="avatar">
                        <img src="{{Storage::url($incom->profile_image)}}">
                    </div>
                    <div class="contact">
                        <a href="{{ route('profile', ['id' => $incom->requester]) }}">
                            <p class="name">{{ $incom->name }}</p>
                        </a>
                        {{-- <p class="text">г.Минск</p>
                        <div class="accepts">
                            <p class="accept">Принять</p>
                            <p class="skip">Отклонить</p>
                        </div> --}}
                    </div>
                </li>
                @else
                <div class="no-contact">
                    <p class="noincom">Входящих заявок нету</p>
                </div>
                @break
                @endif
                @endforeach
            </ul>
        </div>
        <div class="friend-music">
            <p class="zagolovok">Исходящие заявки</p>
            <ul>
                @foreach ($outgoes as $outgo)
                @if(Auth::id() !== $outgo->requester)
                <div class="no-contact">
                    <p class="noincom">Исходящих заявок нету</p>
                </div>
                @else
                <li class="list">
                    <div class="avatar">
                        <img src="{{Storage::url($outgo->profile_image)}}">
                    </div>
                    <div class="contact">
                        <a href="{{ route('profile', ['id' => $outgo->user_requested]) }}">
                            <p class="name">{{ $outgo->name }} {{ $outgo->surname }}</p>
                        </a>
                        <p class="text"></p>
                        {{-- <p class="cancel">Отменить</p> --}}
                    </div>
                </li>
                @break
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

<style>
body {
    background-image: url({{URL::asset('/images/RiuVK7ImaTnhoGVvjvtHL4pCvMVJvU6GGyKK6L73.png')}});
}

.content {
    display: flex;
    margin-left: auto;
    margin-right: auto;
    width: 172vh;
    height: 76.6vh;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    background-color: #020115;
}

.friends-list {
    flex: 4;
    max-height: 100vh;
    border-right: 1px solid #BF077C;
    overflow: auto;
}

.friends-list .search {
    height: 95px;
    display: flexbox;
    justify-content: center;
}

.search input {
     height: inherit;
    width: 100%;
    border: 0;
    outline: none;
    border-bottom: 1px solid #BF077C;
    border-top-left-radius: 10px;
    font-size: 14px;
    background-color: #020115;
}

.search input::-moz-placeholder { color: #ffffff; }
.search input::-webkit-input-placeholder { color: #ffffff; }

.friends-list  .friend-ul {
    list-style: none;
    padding: 0;
}

.friend-ul .friend-li {
    display: flex;
    position: relative;
    padding: 20px;
    border-bottom: 1px solid #BF077C;
}

.friend-li .avatar {
    cursor: pointer;
}

.avatar img {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
}

.contact-a:hover {
    color: #BF077C;
}

li .contact {
    flex: 3;
    overflow: hidden;
    display: flex;
    padding-left: 20px;
    flex-direction: column;
    justify-content: center;
}

.contact p {
    margin: 0;
    color: #ffffff;
}

.name {
    font-weight: bold;
    font-size: 17px;
    line-height: 19px;
    cursor: pointer;
}

.contact .send {
    color: #009DE0;
}

.send:hover {
    cursor: pointer;
    text-decoration: underline;
}

.menu {
    flex: 1;
    max-height: 100vh;
}

.menu .category {
    border-bottom: 1px solid #BF077C;
    padding-top: 20px;
    padding-left: 20px;
}

.category p {
    margin-bottom: 10px;
}

.category p:last-child {
    margin-bottom: 20px;
}

.category .all-friend {
    font-size: 14px;
    font-weight: bold;
    color: #BF077C;
}

.category .online-friend {
    color: #ffffff;
}

.menu .zagolovok {
    padding: 20px;
    margin: 0;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
}

.menu ul {
    list-style: none;
    padding: 0;
}

ul .list {
    display: flex;
    position: relative;
    padding-left: 20px;
    margin-bottom: 20px;
}

.list .avatar {
    cursor: pointer;
}

.list .avatar img {
    width: 64px;
    border-radius: 50%;
}

.list .contact {
    flex: 3;
    overflow: hidden;
    display: flex;
    padding-left: 10px;
    flex-direction: column;
    justify-content: center;
}

.list .contact .name {
    font-weight: bold;
    font-size: 17px;
    line-height: 19px;
    color: #ffffff;
    cursor: pointer;
}

.list .contact .text {
    color: #ffffff;
}

.list .accepts {
    display: flex;
}

.accepts .accept {
    margin-right: 20px;
    color: #009DE0;
}

.accepts .skip {
    color: #656565;
    cursor: pointer;
}

.list .cancel {
    color: #656565;
    cursor: pointer;
}

.list:last-child {
    margin-bottom: 0;
}

.noincom {
    padding-left: 20px;
    font-size: 14px;
    color: #656565;
}
                   
</style>