<template>
<div class="conversation">
    <h1>{{ contact ? contact.name : 'Выберите диалог' }}</h1>
    <MessagesFeed :contacts="contacts" :contact="contact" :messages="messages" :user="user" />
    <MessageComposer @send="sendMessage" />
</div>
</template>

<script>
import MessagesFeed from './MessagesFeed';
import MessageComposer from './MessageComposer';
export default {
    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: []
        },
        contacts: {
            type: Array,
            default: []
        },
        user: {},
    },
    methods: {
        sendMessage(text) {
            if (!this.contact) {
                return;
            }

            axios.post('conversation/send', {
                contact_id: this.contact.id,
                text: text,
            }).then((response) => {
                this.$emit('new', response.data);
            })
        },
    },
    components: {
        MessagesFeed,
        MessageComposer
    }
}
</script>

<style lang="less" scoped>
@border: #FFA31A;

.conversation {
    flex: 6;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

h1 {
    height: 80px;
    font-size: 20px;
    font-weight: bold;
    border-bottom: 1px solid @border;
    padding-top: 30px;
    padding-left: 20px;
    padding-bottom: 30px;
    margin: 0;
    color: #ffffff
}
</style>
