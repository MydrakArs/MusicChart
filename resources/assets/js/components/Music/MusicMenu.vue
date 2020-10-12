<template>
<div class="menu">
    <div class="glav">
        <p class="zagolovok">Главная</p>
        <a href="/music">
            <p>Рекомендации</p>
        </a>
    </div>
    <div class="my-mysic">
        <p class="zagolovok">Моя музыка</p>
        <a href="">
            <p>Треки</p>
        </a>
        <a href="">
            <p>Альбомы</p>
        </a>
        <a href="/music/artists" :artists="artists">
            <p>Исполнители</p>
        </a>
        <a href="">
            <p>Плейлисты</p>
        </a>
    </div>
    <div class="friend-music">
        <p class="zagolovok">Музыка друзей</p>
        <a href="">
            <p>Недавнее</p>
        </a>
    </div>
</div>
</template>

<script>

import Artists from './Artists';

export default {
    data() {
        return {
            artists: []
        }
    },
}
</script>

<style lang="less" scoped>
@f: #ffffff;
@p: #AB1DF8;

.margin {
    margin-left: 20px;
    margin-bottom: 10px;
}

.menu {
    flex: 1.5;
    max-height: 100vh;
    border-Left: 1px solid @p;

    p {
        margin-bottom: 5px;
    }

    a {
        text-decoration: none;
        color: @f;
    }

    a:hover{
        color: @p;
    }

    .zagolovok {
        font-size: 16px;
        font-weight: normal;
        line-height: 50px;
        text-align: left;
        text-transform: uppercase;
        margin: 0;
        color: @f;
    }

    .glav {
        margin-top: 40px;
        .margin();
    }

    .my-mysic {
        .margin();
    }

    .friend-music {
        .margin();
    }
}
</style>
