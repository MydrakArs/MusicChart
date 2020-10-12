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
    <div class="change-info">Измените информацию о себе</div>
    <div class="change-info-flex">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="">
                  <label for="avatar" class="change-label">Изменить ваш аватар</label>
                  <input type="file" name="avatar" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                  <label for="location" class="change-label">Город</label>
                  <input type="text" name="location" value="{{ $info->location }}" class="form-control" required>
            </div>
            <div class="form-group">
                  <label for="location" class="change-label">Статус</label>
                  <textarea name="about" id="about" cols="30" rows="10" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                  <p class="text-center">
                        <button class="change-btn" type="submit">
                              Сохранить
                        </button>
                  </p>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    body {
            background-image: url({{URL::asset('/images/backProfile.png')}});
    }
    .content {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
        width: 172vh;
        height: 76.6vh;
        background-color: #020115;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .change-info {
        display: flex;
        justify-content: center;
        font-size: 24px;
        margin-top: 20px;
        margin-bottom: 20px;
        color: #ffffff;
    }
    .change-info-flex {
        display: flex;
        justify-content: center;
    }
    .change-label {
        font-size: 18px;
        font-weight: 500;
        margin-top: 20px;
        color: #ffffff;
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