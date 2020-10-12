<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MusicCharts</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href=" {{ URL::asset('css/style.css') }} " rel="stylesheet" type="text/css">

    </head>
    <body>
        <div>
            <div id="app">
                <starttext></starttext>
                <div class="content">
                    <div class="center">
                        <div class="header">
                            <div class="reg">Авторизация</div>
                            <div class="auth"><a href="/register">Регистрация</a></div>
                        </div>
                        <div class="body-form">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <h2>Email</h2>
                                    <input id="email" type="text" name="email" value="{{ old('email') }}" required>
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
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="serch-margin">
                                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">Запомнить меня</label>
                                        </div>
                                        <div class="serch-margin">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Забыли свой пароль ? 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center margin-bottom-20 ulogin" id="uLogin"
                                        data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                                                    providers=vkontakte,facebook,google,instagram,twitter;
                                                    redirect_uri={{ urlencode('http://' . $_SERVER['HTTP_HOST']) }}/ulogin;mobilebuttons=0;">
                                </div>
                                <div class="form-group">
                                    <div class="submit">
                                        <input type="submit" value="Войти">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="/js/app.js"></script>
<script src="//ulogin.ru/js/ulogin.js"></script>

