<template>
<div class="friends-list">
    <div class="search">
        <input type="search" placeholder="Поиск новых друзей...">
    </div>
    <ul>
        <li>
            <div class="avatar">
                <img src="http://via.placeholder.com/150x150">
            </div>
            <div class="contact">
                <p class="name">Мудрак Арсений</p>
                <p class="text">г.Минск</p>
                <p class="send">Отправить сообщение</p>
            </div>
        </li>
        <li>
            <div class="avatar">
                <img src="http://via.placeholder.com/150x150">
            </div>
            <div class="contact">
                <p class="name">Мудрак Арсений</p>
                <p class="text">г.Минск</p>
                <p class="send">Отправить сообщение</p>
            </div>
        </li>
        <li>
            <div class="avatar">
                <img src="http://via.placeholder.com/150x150">
            </div>
            <div class="contact">
                <p class="name">Мудрак Арсений</p>
                <p class="text">г.Минск</p>
                <p class="send">Отправить сообщение</p>
            </div>
        </li>
    </ul>
</div>
</template>

<script>
export default {}
</script>

<style lang="less" scoped>
@f: #ffffff;
@bcmain: #020115;
@border: #B7D2ED;

.friends-list {
    flex: 4;
    max-height: 100vh;
    border-right: 1px solid #B7D2ED;
    overflow: auto;

    .search {
        height: 95px;
        display: flexbox;
        justify-content: center;

        input {
            height: inherit;
            width: 100%;
            border: 0;
            outline: none;
            border-bottom: 1px solid #B7D2ED;
            border-top-left-radius: 10px;
            font-size: 14px;
            background-color: #020115;
        }
        input::-moz-placeholder { color: #ffffff; }
        input::-webkit-input-placeholder { color: #ffffff; }
    }

    ul {
        list-style: none;
        padding: 0;

        li {
            display: flex;
            position: relative;
            padding: 20px;
            border-bottom: 1px solid #B7D2ED;

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
                padding-left: 20px;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;
                    color: @f;

                    &.name {
                        font-weight: bold;
                        font-size: 17px;
                        line-height: 19px;
                        cursor: pointer;
                    }

                    &.send {
                        color: #009DE0;
                    }

                    &.send:hover {
                        cursor: pointer;
                        text-decoration: underline;
                    }
                }
            }
        }
    }
}

.friends-list::-webkit-scrollbar {
    width: 4px;
    background-color: transparent;
}

/* Thumb */
.friends-list::-webkit-scrollbar-thumb {
    background: white;
    border-radius: 20px;
}

// .contacts-list {
//     flex: 2;
//     max-height: 100vh;
//     border-right: 1px solid white;

//     ul {
//         list-style: none;
//         padding-left: 20px;

//         li {
//             display: flex;
//             height: 80px;
//             position: relative;
//             cursor: pointer;

//             span.unread {
//                 position: absolute;
//                 right: 20px;
//                 bottom: 5px;
//                 display: flex;
//                 font-weight: 700;
//                 min-width: 20px;
//                 min-height: 20px;
//                 justify-content: center;
//                 align-items: center;
//                 line-height: 20px;
//                 font-size: 12px;
//                 padding: 0 4px;
//                 border-radius: 50%;
//                 color: @lightgray;
//                 background: @unread;
//             }

//             &.selected {
//                 background-color: @lightgray;
//             }

//             .avatar {
//                 display: flex;
//                 flex: 1;
//                 align-items: center;

//                 img {
//                     width: 64px;
//                     border-radius: 50%;
//                     margin: 0 auto;
//                 }
//             }

//             .contact {
//                 border-bottom: 1px solid white;
//                 flex: 3;
//                 overflow: hidden;
//                 display: flex;
//                 flex-direction: column;
//                 justify-content: center;

//                 p {
//                     margin: 0;

//                     &.name {
//                         font-weight: bold;
//                         font-size: 16px;
//                     }
//                 }
//             }
//         }
//     }
// }
</style>
