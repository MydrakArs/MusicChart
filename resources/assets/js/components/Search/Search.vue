<template>
    <div class="cont">
        <div class="">
            <div>
                <input class="search" type="text" placeholder="Поиск по пользователям" v-model="query" @keyup="search()">
                <div class="search-resualt">
                    <div v-for="user in results">
                        <div class="resualt">
                            <h4 class="effect">{{user.name}}</h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    var algoliasearch = require('algoliasearch')

    var client = algoliasearch('S6KEJ947VS', 'c1ef60d1f8494f9265b5f5b32f0ee0ad')

    var index = client.initIndex('users')

    export default {
        mounted() {

        },
        data() {
            return {
                query: '',
                results: []
            }
        },
        methods: {
            search() {
                index.search(this.query).then(({hits}) => {
                    this.results = hits;
                })
            }
        }
    }
</script>

<style lang="less" scoped>
.cont {
    margin-top: 27px;
}

.search {
    border:none;
    border-radius: 10px;
    outline: none;
}

.search-resualt {
    position: absolute;
    border-radius: 10px;
    width: 300px;
    top: 70px;
    background-color: black;
    box-shadow: 0 0 10px rgba(255,255,255)
}

.resualt {
    display: flex;
    margin-left: 10px;
    margin-top: 20px;
    margin-bottom: 20px;
}

.resualt img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.resualt h4 {
    margin: 0;
    padding: 0;
    color: white;
}
.effect {
    cursor: pointer;
}
</style>