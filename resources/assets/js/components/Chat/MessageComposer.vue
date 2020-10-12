<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message ..."></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: '',
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style lang="less" scoped>
.composer textarea {
    width: 96%;
    height: 60px;
    margin: 10px;
    resize: none;
    border-radius: 10px;
    border: 1px solid #dfdfdf;
    padding: 6px;
    outline: none;
}
</style>