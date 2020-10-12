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
        <a href="{{ url('friends') }}">
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
    <div class="nots-head">Ваши уведомления</div>
    <ul class="nots-head-ul">
        @foreach ($nots as $not)
            <li class="nots-head-li">
                <div class="nots-name">{{ $not->data['name'] }}</div>
                <div class="nots-message">{{ $not->data['message'] }}</div>
                <span class="nots-date">{{ $not->created_at->diffForHumans() }}</span>
            </li>
        @endforeach
    </ul>
</div>

@endsection

<style>
body {
        background-image: url({{URL::asset('/images/backProfile.png')}});
}
.content {
    margin-left: auto;
    margin-right: auto;
    width: 120vh;
    height: 76.6vh;
    background-color: #020115;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
</style>