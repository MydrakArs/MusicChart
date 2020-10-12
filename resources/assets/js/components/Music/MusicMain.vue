<template>
    <div class="content">
        <MusicContent :artists="artists" :albums="albums" />
        <MusicMenu :artists="artists" />
    </div>
</template>

<script>
import MusicMenu from './MusicMenu';
import MusicContent from './MusicContent';

export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            artists: [],
            albums: []
        }
    },
    mounted() {
        axios.post('/music')
            .then((response) => {
                console.log(response.data);
                this.artists = response.data;
            });
        axios.post('music/alb')
            .then((response) => {
                console.log(response.data);
                this.albums = response.data;
            })
    },
    components: {MusicMenu, MusicContent},
}
</script>

<style lang="less" scoped>

@bcmain: #020115;

.content {
    display: flex;
    margin-left: auto;
    margin-right: auto;
    width: 172vh;
    height: 76.6vh;
    background-color: @bcmain;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
}
</style>