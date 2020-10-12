<template>
<div class="content">
    <ImageUploader />
</div>
</template>

<script>
import ImageUploader from './ImageUploader';

export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    components: {ImageUploader}
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