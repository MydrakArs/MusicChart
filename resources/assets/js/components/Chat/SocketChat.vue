<template>
<div class="content">
    <ContactsList :contacts="contacts" :messages="messages" @selected="startConversationWith" />
    <Conversation :contacts="contacts" :contact="selectedContact" :messages="messages" @new="saveNewMessage" />
</div>
</template>

<script>
import Conversation from './Conversation';
import ContactsList from './ContactsList'

export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            selectedContact: null,
            messages: [],
            contacts: [],
        };
    },
    computed: {
        channel() {
            return Echo.private(`messages.${this.user.id}`);
        }
    },
    mounted() {
        this.channel
            .listen('NewMessage', (e) => {
                this.hanleIncoming(e.message);
            })

        axios.get('/contacts')
            .then((response) => {
                this.contacts = response.data;
            })
    },
    methods: {
        startConversationWith(contact) {
            this.updateUnreadCount(contact, true);

            axios.get(`/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        hanleIncoming(message) {
            if(this.selectedContact && message.from == this.selectedContact.id) {
                this.saveNewMessage(message);
                return;
            }

            this.updateUnreadCount(message.from_contact, false);
        },
        updateUnreadCount(contact, reset) {
            this.contacts = this.contacts.map((single) => {
                if(single.id != contact.id) {
                    return single;
                }

                if(reset)
                    single.unread = 0;
                else
                    single.unread += 1;

                return single;
            })
        }
    },
    components: {
        Conversation,
        ContactsList
    }
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

.dialog {
    background-color: white;
    width: 316px;
}
</style>
