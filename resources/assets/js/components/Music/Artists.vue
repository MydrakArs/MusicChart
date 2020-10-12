<template>
<div class="content">
    <ArtistsContent :artists="artists"></ArtistsContent>
    <MusicMenu></MusicMenu>
</div>
</template>

<script>
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
        }
    },
    mounted() {
        axios.post('/music/artists')
            .then((response) => {
                console.log(response.data);
                this.artists = response.data;
            });
    },
}
</script>

<style lang="less" scoped>
@bcmain: #17171A;

.content {
    display: flex;
    margin-left: auto;
    margin-right: auto;
    width: 172vh;
    height: 76.6vh;
    background-color: @bcmain;
}
</style>
