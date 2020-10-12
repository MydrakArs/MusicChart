<template>
<div class="content">
    <div class="center">
        <div class="header">
            <div class="auth">Авторизация</div>
            <div class="reg"><a href="registration">Регистрация</a></div>
        </div>
        <div class="body-form">
            <form method="" action="">
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
                <div class="submit">
                    <input type="submit" value="Войти">
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.');
    }
}
</script>

<style lang="less" scoped>
@ActiveColor: #24CBE2;
@WC: #ffffff;
@ContentColor: #24232D;
@width: 300px;
@margin100: 100px;
@margin20: 20px;
@margin30: 30px;
@marginTop: 330px;

html,
body {
    padding: 0;
    margin: 0;
    color: @WC;
}

h2 {
    font-size: 20px;
}

a {
    text-decoration: none;
    color: @ActiveColor;
}

.header {
    display: flex;
    align-items: flex-end;
}

.content {
    background-color: @ContentColor;
    width: 500px;
    color: @WC;
    font-family: 'Roboto', sans-serif;
}

.center {
    margin-left: @margin100;
    margin-top: @marginTop;
    font-weight: regular;

    .auth {
        font-size: 24px;
    }

    .reg {
        font-size: 12px;
        margin-left: @margin20;
        color: @ActiveColor;
        margin-bottom: 3px;
    }
}

.body-form {
    margin-top: @margin30;

    input[type="text"],
    input[type="password"] {
        width: @width;
        padding: 5px;
        box-sizing: border-box;
        border: none;
        outline: none;
        border-bottom: 1px solid @WC;
        background: transparent;
        color: @WC;
        font-size: 20px;
        cursor: pointer;
    }

    input[type="submit"] {
        margin: 0;
        padding: 0;
        border: none;
        outline: none;
        border-radius: 50px;
        width: 245px;
        height: 62px;
        background-color: @ActiveColor;
        color: @WC;
        cursor: pointer;
    }

    input[type="text"]:focus~.label-box1 label,
    input[type="text"]:valid~.label-box1 label,
    input[type="password"]:focus~.label-box2 label,
    input[type="password"]:valid~.label-box2 label {
        font-size: 10px;
        transform: translateY(-15px);
        color: @ActiveColor;
    }

    input[type="text"]:focus~.label-box1::before,
    input[type="text"]:focus~.label-box1::after,
    input[type="password"]:focus~.label-box2::before,
    input[type="password"]:focus~.label-box2::after {
        width: 100%;
        background-color: @ActiveColor;
    }

    input[type="submit"]:active {
        opacity: .8;
    }

    .label-box1 {
        position: relative;
        width: 300px;

        &:after {
            content: "";
            position: absolute;
            height: 2px;
            width: 0;
            bottom: 0px;
            background-color: @ActiveColor;
            transition-property: width;
            transition-duration: 0.5s;
        }

        &:after {
            left: 0;
        }

        label {
            position: absolute;
            top: -25px;
            left: 0;
            pointer-events: none;
            transition-duration: 0.2s;
        }
    }

    .label-box2 {
        position: relative;
        width: 300px;

        &:after {
            content: "";
            position: absolute;
            height: 2px;
            width: 0;
            bottom: 0px;
            background-color: @ActiveColor;
            transition-property: width;
            transition-duration: 0.5s;
        }

        &:after {
            left: 0;
        }

        label {
            position: absolute;
            top: -25px;
            left: 0;
            pointer-events: none;
            transition-duration: 0.2s;
        }
    }

    .submit {
        width: 300px;
        display: flex;
        margin-top: @margin30;
        justify-content: center;
    }

}
</style>
