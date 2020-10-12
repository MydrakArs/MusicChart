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
        <a href="{{ route('friends', ['id' => Auth::user()->id]) }}">
            <li>
                <img src="{{URL::asset('/images/friend.svg')}}">
            </li>
        </a>
        <a class="message-block" href="{{ url('home') }}">
            <li>
                <img src="{{URL::asset('/images/message.svg')}}">
            </li>
        </a>
    </ul>
    <div class="message">
        <p>Сообщения</p>
    </div>
</div>
<Message :user="{{ auth()->user() }}"></Message>
@endsection

<style>
    body {
        background-size: cover;
        background-image: url({{URL::asset('/images/backMassage.png')}});
}
</style>

 {{-- <div class="main-menu">
    <ul class="main-menu-ul">
        <a href="{{ url('profile') }}">
            <li>
                <img src="{{URL::asset('/images/person.svg')}}">
                <p>Профиль</p>
            </li>
        </a>
        <a href="{{ url('music') }}">
            <li>
                <img src="{{URL::asset('/images/music1.svg')}}">
                <p>Музыка</p>
            </li>
        </a>
        <a href="{{ url('friends') }}">
            <li>
                <img src="{{URL::asset('/images/friend.svg')}}">
                <p>Друзья</p>
            </li>
        </a>
        <a href="{{ url('home') }}">
            <li>
                <img src="{{URL::asset('/images/message.svg')}}">
                <p>Сообщения</p>
            </li>
        </a>
    </ul>
</div> --}}