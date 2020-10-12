<template>
<div class="menu">
    <div class="category">
        <p class="all-friend">Все друзья</p>
        <p class="online-friend">Друзья онлайн</p>
    </div>
    <div class="glav">
        <p class="zagolovok">Входящие заявки</p>
        <ul>
            <li>
                <div class="avatar">
                    <img src="http://via.placeholder.com/150x150">
                </div>
                <div class="contact">
                    <p class="name">Мудрак Арсений</p>
                    <p class="text">г.Минск</p>
                    <div class="accepts">
                        <p class="accept">Принять</p>
                        <p class="skip">Отклонить</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="avatar">
                    <img src="http://via.placeholder.com/150x150">
                </div>
                <div class="contact">
                    <p class="name">Мудрак Арсений</p>
                    <p class="text">г.Минск</p>
                    <div class="accepts">
                        <p class="accept">Принять</p>
                        <p class="skip">Отклонить</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="friend-music">
        <p class="zagolovok">Исходящие заявки</p>
        <ul>
            <li>
                <div class="avatar">
                    <img src="http://via.placeholder.com/150x150">
                </div>
                <div class="contact">
                    <p class="name">Мудрак Арсений</p>
                    <p class="text">г.Минск</p>
                    <p class="cancel">Отменить</p>
                </div>
            </li>
            <li>
                <div class="avatar">
                    <img src="http://via.placeholder.com/150x150">
                </div>
                <div class="contact">
                    <p class="name">Мудрак Арсений</p>
                    <p class="text">г.Минск</p>
                    <p class="cancel">Отменить</p>
                </div>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
export default {}
</script>

<style lang="less" scoped>
@f: #ffffff;
@border: #B7D2ED;
@cancel: #656565;

.menu {
    flex: 1;
    max-height: 100vh;

    .category {
        border-bottom: 1px solid @border;
        padding-top: 20px;
        padding-left: 20px;

        p {
            margin-bottom: 10px;
        }

        p:last-child {
            margin-bottom: 20px;
        }

        .all-friend {
            font-size: 14px;
            font-weight: bold;
            color: #BF077C;
        }

        .online-friend {
            color: @f;
        }
    }

    .zagolovok {
        padding: 20px;
        margin: 0;
        font-size: 16px;
        font-weight: bold;
        color: @f;
    }

    ul {
        list-style: none;
        padding: 0;

        li {
            display: flex;
            position: relative;
            padding-left: 20px;
            margin-bottom: 20px;

            .avatar {
                cursor: pointer;

                img {
                    width: 64px;
                    border-radius: 50%;
                }
            }

            .contact {
                flex: 3;
                overflow: hidden;
                display: flex;
                padding-left: 10px;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name {
                        font-weight: bold;
                        font-size: 17px;
                        line-height: 19px;
                        color: @f;
                        cursor: pointer;
                    }

                    &.text {
                        color: @f;
                    }
                }
            }

            .accepts {
                display: flex;

                .accept {
                    margin-right: 20px;
                    color: #009DE0;
                    cursor: pointer;
                }

                .skip {
                    color: @cancel;
                    cursor: pointer;
                }
            }

            .cancel {
                color: @cancel;
                cursor: pointer;
            }
        }

        li:last-child {
            margin-bottom: 0;
        }
    }
}
</style>
