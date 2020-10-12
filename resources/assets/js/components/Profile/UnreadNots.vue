<template>
    <span class="unread">{{ all_nots_count }}</span>
</template>

<script>
    export default {
        mounted() {
            this.get_unread()
        },
        methods: {
            get_unread() {
                axios.get('/get_unread')
                     .then( (nots) => {
                         nots.data.forEach( (not) => {
                             this.$store.commit('add_not', not);
                         })
                     })
            }
        },
        computed: {
            all_nots_count() {
                return this.$store.getters.all_nots_count
            }
        }
    }
</script>

<style lang="less">
.unread {
    position: absolute;
    bottom: 12px;
    left: 7.4px;
    color: #00D4FF;
}
</style>