@extends('layouts.app')

@section('content')
<div class="content">
    <div class="center">
        <div class="header">
            <div class="reg">Регистрация</div>
            <div class="auth"><a href="/">Авторизация</a></div>
        </div>
        <div class="body-form">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <h2>Ваше имя</h2>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                    <div class="label-box1">
                        <label for="email">Имя</label>
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                        
                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                    <h2>Ваша фамилия</h2>
                    <input id="surname" type="text" name="surname" value="{{ old('surnname') }}" required>
                    <div class="label-box2">
                        <label for="password">Фамилия</label>
                    </div>
                    @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('singer_name') ? ' has-error' : '' }}">
                    <div class="not-necessery">
                        <h2>Пвсевдоним</h2>
                        <p>(не обязательно)</p>
                    </div>
                    <input id="singer_name" type="text" name="singer_name"  value="{{ old('singer_name') }}" required>
                    <div class="label-box2">
                        <label for="singer_name">Ваш псевдоним исполнителя</label>
                    </div>
                    @if ($errors->has('singer_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('singer_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <h2>Email</h2>
                    <input id="email" type="text" name="email"  value="{{ old('email') }}" required>
                    <div class="label-box1">
                        <label for="email">email</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <h2>Ваш пароль</h2>
                    <input id="password" type="password" name="password" required>
                    <div class="label-box2">
                        <label for="password">Пароль</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <h2>Повторите ваш пароль</h2>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                    <div class="label-box2">
                        <label for="password_confirmation">Пароль</label>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="Присоединиться">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection