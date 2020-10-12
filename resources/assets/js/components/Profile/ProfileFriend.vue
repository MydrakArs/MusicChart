<template>
<div class="friends">
    <div>
        <p v-if="loading">Загрузка...</p>
        <p v-if="!loading">
            <button class="button" v-if="status == 0" @click="add_friend"> Добавить в друзья</button>
            <button class="button" v-if="status == 'pending'" @click="accept_friend">Принять в друзья</button>
            <span v-if="status == 'waiting'">Вы отправили заявку</span>
            <span v-if="status == 'friends'">У вас в друзьях</span>
        </p>
    </div>
</div>
</template>

<script>
import noty from 'noty';
export default {
    props: ['profile_user_id'],
    data() {
        return {
            status: '',
            loading: true
        }
    },
    mounted() {

        axios.get('/check_relationship_status/' + this.profile_user_id)
            .then((response) => {
                console.log(response);
                this.status = response.data.status;
                this.loading = false;
            });

    },
    methods: {
        add_friend() {
            this.loading = true;
            axios.get('/add_friend/' + this.profile_user_id)
                .then((response) => {
                    if (response.data.status === 1) {
                        this.status = "waiting";
                        new noty({
                            type: 'success',
                            layout: 'bottomright',
                            text: 'Запрос отправлен',
                            theme: 'light',
                            timeout: 5000
                        }).show();
                        this.loading = false;
                    }
                });
        },
        accept_friend() {
            this.loading = true;
            axios.get('/accept_friend/' + this.profile_user_id)
                .then((response) => {
                    if (response.data.status === 1) {
                        this.status = 'friends';
                        new noty({
                            type: 'success',
                            layout: 'bottomright',
                            text: 'Вы приняли заявку в друзья!',
                            theme: 'light',
                            timeout: 5000
                        }).show();
                        this.loading = false;
                    }
                })
        },
        test() {
            new noty({
                type: 'error',
                layout: 'bottomright',
                text: 'Вы приняли заявку в друзья!',
                timeout: 20000,
                theme: 'light'
            }).show();
        }
    },
}
</script>

<style lang="less" scoped>
@bcmain: #020115;

// .content {
//     display: flex;
//     margin-left: auto;
//     margin-right: auto;
//     width: 172vh;
//     height: 83.7vh;
//     background-color: @bcmain;
//     border-top-right-radius: 10px;
//     border-top-left-radius: 10px;
// }

button {
    border: none;
    padding-left: 15px;
}

.button {
    display: flex;
    align-items: center;
    width: 152px;
    height: 38px;
    text-align: center;
    vertical-align: center;
    background: linear-gradient(105.5deg, #00D4FF 3.38%, #150E91 94.16%);
    border-radius: 10px;
}

.button a {
    color: #ffffff;
    margin: auto;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 12px;
    line-height: 14px;
    letter-spacing: 0.01em;
    text-decoration: none;
}

.button a:hover {
    opacity: .5;
}

.button a:-webkit-any-link {
    color: #ffffff;
    cursor: pointer;
    text-decoration: none;
}

</style>

