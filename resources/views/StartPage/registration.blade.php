<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

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
                            <div class="reg">Регистрация</div>
                            <div class="auth"><a href="/">Авторизация</a></div>
                        </div>
                        <div class="body-form">
                            <form method="post" action="MainPage">
                                <h2>Ваше имя</h2>
                                <input type="text" name="name" required>
                                <div class="label-box1">
                                    <label for="email">Имя</label>
                                </div>
                                <h2>Ваша фамилия</h2>
                                <input type="text" name="surname" required>
                                <div class="label-box2">
                                    <label for="password">Фамилия</label>
                                </div>
                                <div class="not-necessery">
                                    <h2>Пвсевдоним</h2>
                                    <p>(не обязательно)</p>
                                </div>
                                <input type="text" name="singer_name" required>
                                <div class="label-box2">
                                    <label for="password">Ваш псевдоним исполнителя</label>
                                </div>
                                <h2>Email</h2>
                                <input type="text" name="email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)" required>
                                <div class="label-box1">
                                    <label for="email">email</label>
                                </div>
                                <h2>Ваш пароль</h2>
                                <input type="password" name="password" required>
                                <div class="label-box2">
                                    <label for="password">Пароль</label>
                                </div>
                                <h2>Повторите ваш пароль</h2>
                                <input type="password" name="comfirm_password" required>
                                <div class="label-box2">
                                    <label for="password">Пароль</label>
                                </div>
                                <div class="submit">
                                    <input type="submit" value="Присоединиться">
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


