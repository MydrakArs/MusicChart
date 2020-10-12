<template>
<div class="Artists-content">
    <div class="section">
        <h2>Исполнители</h2>
        <p>Лучшие исполнители на этой неделе</p>
        <div class="section-cards">
            <div class="section-card" v-for="artist in artists" :key="artist.id">
                <div class="image">
                    <img :src="artist.profile_image" :alt="artist.name">
                </div>
                <div class="info">
                    <p class="name-artist">{{ artist.name }}</p>
                    <div class="info-song">
                        <p class="name-song">{{ artist.name }}</p>
                        <p class="date">Lorem</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <h2>Новые релизы</h2>
    </div>
</div>
</template>

<script>
export default {
    props: {
        artists: {
            type: Array,
            default: []
        }
    },
}
</script>

<style lang="less" scoped>
@bcmain: #17171A;

.Artists-content {
    flex: 6;

    .section {
        padding-top: 40px;
        padding-left: 40px;

        h2 {
            font-size: 24px;
            line-height: 28px;
            margin: 0;
        }

        p {
            font-size: 12px;
            line-height: 14px;
        }

        .section-cards {
            display: flex;
            margin-top: 20px;
            width: 100%;
            max-width: 1300px;
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

                    .name-artist {
                        font-size: 14px;
                        line-height: 16px;
                        font-weight: bold;
                        margin-top: 20px;
                    }

                    .info-song {
                        display: flex;
                        padding-top: 5px;
                        justify-content: space-between;
                        align-items: center;

                        .name-song {
                            font-size: 14px;
                            line-height: 16px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
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

}

.section-cards::-webkit-scrollbar {
    height: 4px;
    background-color: transparent;
}

/* Thumb */
.section-cards::-webkit-scrollbar-thumb {
    background: white;
    border-radius: 20px;
}
</style>
