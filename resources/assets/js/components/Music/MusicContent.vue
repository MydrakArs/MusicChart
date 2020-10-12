<template>
<div class="music-content">
    <div class="section">
        <h2>Популярное</h2>
        <p>Самое популярное и прослушиваемое</p>
        <div class="section-cards">
            <div class="section-card" v-for="artist in artists" :key="artist.id">
                <div class="image">
                    <img :src="artist.profile_image" :alt="artist.name">
                </div>
                <div class="info">
                    <a href="">
                        <p class="name-artist">{{ artist.name }}</p>
                    </a>
                    <div class="info-song">
                        <p class="name-song">{{ artist.name }}</p>
                        <p class="date">22.04.2020</p>
                        <button class="btn btn-primary btn-sm" @click.prevent="playSound('http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3')"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <h2>Новинки</h2>
        <p>Самые свежие новинки месяца</p>
        <div class="section-cards">
            <div class="section-card" v-for="artist in artists" :key="artist.id">
                <div class="image">
                    <img :src="artist.profile_image" :alt="artist.name">
                </div>
                <div class="info">
                    <p class="name-artist">Mandrox</p>
                    <div class="info-song">
                        <p class="name-song">Modretia</p>
                        <p class="date">22.04.2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <h2>Альбомы</h2>
        <p>Найди для себя что-то интересное</p>
        <div class="section-cards">
            <div class="section-card" v-for="album in albums" :key="album.id">
                <div class="image">
                    <img src="public/images/1.jpg" :alt="album.name">
                </div>
                <div class="info">
                    <p class="name-artist">{{ album.name }}</p>
                    <div class="info-song"  v-for="artist in artists" :key="artist.id">
                        <p class="name-song" v-if="artist.id == album.artist_id">{{ artist.name }}</p>
                        <p class="date" v-if="artist.id == album.artist_id">22.04.2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        artists: {
            type: Array,
            default: []
        },
        albums: {
            type: Array,
            default: []
        }
    },
    methods: {
        playSound(sound) {
            if (sound) {
                var audio = new Audio(sound);
                audio.play();
            }
        }
    }
}
</script>

<style lang="less" scoped>
@p: #AB1DF8;
.music-content {
    flex: 6;
    overflow-x: auto;
}

.section {
    padding-top: 30px;
    padding-left: 20px;

    h2 {
        font-size: 24px;
        line-height: 28px;
        margin: 0;
        color: #ffffff;
    }

    p {
        font-size: 12px;
        line-height: 14px;
        color: @p;
    }

    .section-cards {
        display: flex;
        margin-top: 20px;
        width: 100%;
        max-width: 1310px;
        margin-right: 40px;
        padding-bottom: 15px;
        overflow-x: scroll;

        .section-card {
            width: 220px;
            height: 240px;
            margin-right: 20px;

            .image {
                width: 220px;
                height: 180px;

                img {
                    min-width: 220px;
                    min-height: 180px;
                    max-width: 220px;
                    max-height: 180px;
                }
            }

            .info {
                margin-top: -10px;

                p {
                    padding: 0;
                    margin: 0;
                    color: white;
                }

                a {
                    text-decoration: none;
                }

                .name-artist {
                    font-size: 14px;
                    line-height: 16px;
                    font-weight: bold;
                    margin-top: 20px;
                    padding-bottom: 5px;
                    cursor: pointer;
                }

                .info-song {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;

                    .name-song {
                        font-size: 14px;
                        line-height: 16px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }

                    .display {
                        display: none;
                    }

                    .date {
                        font-size: 14px;
                        line-height: 16px;
                    }
                }

            }
        }
    }
}

.section-cards::-webkit-scrollbar {
    height: 4px;
    background-color: transparent;
}

.section-cards::-webkit-scrollbar-thumb {
    background: @p;
    border-radius: 20px;
}

.music-content::-webkit-scrollbar-thumb {
    background: @p;
    border-radius: 20px;
}

.music-content::-webkit-scrollbar {
    width: 4px;
    background-color: transparent;
}
</style>
