<template>
<div class="feed" ref="feed">
    <ul v-if="contact">
        <li v-for="message in messages" :class="`massage ${message.to == contact.id ? 'sent' : 'received'}`" :key="message.id">
            <div class="avatar" v-for="contact in contacts" :key="contact.id">
                <img v-if="message.from == contact.id " :src="contact.profile_image" :alt="contact.name">
            </div>
            <div class="text">
                <p class="name" v-if="message.from == contact.id">{{ contact.name }} {{contact.surname}}</p>
                <p class="name" v-else>Вы</p>
                <p class="mes">{{ message.text }}</p>
            </div>
        </li>
    </ul>
</div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array
        },
        contact: {
            type: Object
        },
        messages: {
            type: Array,
            required: true
        }
    },
    methods: {
        scrollToBottom() {
            setTimeout(() => {
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50);
        }
    },
    watch: {
        contact(contact) {
            this.scrollToBottom();
        },
        messages(messages) {
            this.scrollToBottom();
        }
    }
}
</script>

<style lang="less" scoped>

.name {
    font-size: 16px;
    font-weight: bold;
}

.mes {
    font-size: 16px;
    line-height: 30px;
}

.feed {
    height: 100%;
    max-height: 770px;
    overflow-y: auto;

    ul {
        list-style: none;
        padding: 5px;
        padding-left: 20px;
        padding-bottom: 34px;

        li {
            display: flex;
            position: relative;
            cursor: pointer;
            padding-top: 20px;

            .avatar {

                img {
                    width: 64px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

            &.massage {
                width: 100%;
                margin: 0;

                .text {
                    max-width: 1000px;
                    padding: 0;
                    display: inline-block;
                    margin-left: 20px;
                    color: white;
                }

                // &.received {

                //     .text {}
                // }

                // &.sent {

                //     .text {}
                // }
            }
        }
    }
}

/* Width */
.feed::-webkit-scrollbar {
    width: 6px;
    background-color: transparent;
}

/* Thumb */
.feed::-webkit-scrollbar-thumb {
    background: #FFA31A;
    border-radius: 20px;
}

.feed::-webkit-scrollbar-thumb:scrol {
    background: yellow;
}
</style>
