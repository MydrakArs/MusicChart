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
    <div class="header">
        <div class="margin-right">
            <a href="{{ url('/profile/add/profile') }}">
                <h2>Альбом</h2>
            </a>
        </div>
        <div class="no-active-a">
            <a href="{{ url('/profile/song/profile') }}">
                <h2>Аудиозапись</h2>
            </a>
        </div>
    </div>
    <div class="form">
        <form action="{{ route('profile.add_album') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-content">
                <imageUploader></imageUploader>
                <div class="margin-right-form">
                    <div class="form-group">
                        <label for="avatar">Выберите обложку альбома</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*" multiple>
                    </div>
                    <div class="info">
                        <div class="album-name">
                            <input type="text" name="name" placeholder="Название альбома" required>
                        </div>
                        <div class="cover">
                            <input type="text" name="cover" placeholder="Участники альбома" class="" required>
                        </div>
                    </div>
                </div>
                <div class="accept-btn">
                    <p class="text-center">
                        <button class="change-btn" type="submit">
                            Сохранить
                        </button>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <div>
    </div>
</div>

@endsection

<style>
    body {
            background-image: url({{URL::asset('/images/backProfile.png')}});
    }
    .content {
        margin-left: auto;
        margin-right: auto;
        width: 172vh;
        height: 76.6vh;
        display: flex;
        flex-direction: column;
        background-color: #020115;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .form {
        margin-top: 50px;
        margin-left: 70px;
        display: flex;
    }

    .form-content {
        display: flex;
    }

    .form-group {
        margin-left: 40px;
    }

    .accept-btn {
        margin-left: 80px;
        margin-top: 80px;
    }

    .margin-right-form {
        margin-left: 100px;
    }

    .info input {
        border: none;
        width: 300px;
        border-bottom: 1px solid #00D4FF;
        background: transparent;
        outline: none;
        color: #ffffff;
    }

    .info input:focus {
        border-bottom: 2px solid #00D4FF;
    }

    .album-name {
        margin-top: 60px;
        margin-left: 40px
    }

    .cover {
        margin-top: 75px;
        margin-left: 40px;
    }

    ::-webkit-input-placeholder {
        color: #ffffff;
        font-size: 18px;
        line-height: 21px;
    }

    :-moz-placeholder { /* Firefox 18- */
        color: #ffffff;
        font-size: 18px;
        line-height: 21px;
    }

    ::-moz-placeholder {  /* Firefox 19+ */
        color: #ffffff;
        font-size: 18px;
        line-height: 21px;
    }

    :-ms-input-placeholder {  
        color: #ffffff;
        font-size: 18px;
        line-height: 21px;
    }

    .header {
    display: flex;
    margin-left: 105px;
    width: 700px;
    justify-content: center;
    }

    .header .margin-right {
        margin-right: 100px;
        width: 220px;
        border-bottom: 1px solid #00D4FF;
        display: flex;
        justify-content: center;
    }

    .header .bottom-line {
        width: 220px;
        border-bottom: 1px solid #00D4FF;
        display: flex;
        justify-content: center;
    }

    .header h2 {
        font-size: 24px;
        line-height: 28px;
        align-items: center;
    }

    .margin-right a {
        color: #00D4FF;
    }

    .no-active-a a {
        color: #00D4FF;
    }

    .margin-right a:hover {
        text-decoration: none;
    }
    .no-active-a a:hover {
        text-decoration: none;
    }
    .change-btn {
        width: 152px;
        height: 38px;
        text-align: center;
        vertical-align: center;
        background: linear-gradient(105.5deg, #00D4FF 3.38%, #150E91 94.16%);
        border-radius: 10px;
        outline: none;
        border: none;
        margin-top: 20px;
        color: #ffffff;
    }
</style>