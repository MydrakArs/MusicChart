<template>
    <div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.listen()
        },
        props: ['id'],
        methods: {
            listen() {
                Echo.private('App.User.' + this.id)
                    .notification( (notification) => {
                        new noty({
                            type: 'success',
                            layout: 'bottomright',
                            text: notification.name + notification.message,
                            theme: 'light',
                            timeout: 5000
                        }).show();

                        this.$store.commit('add_not', notification);

                        document.getElementById("noty_audio").play()
                    })
            }
        }
    }
</script>