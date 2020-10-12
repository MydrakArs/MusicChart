<template>
<div class="contacts-list">
    <ul>
        <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
            <div class="avatar">
                <img :src="contact.profile_image" :alt="contact.name">
            </div>
            <div class="contact">
                <p class="name">{{ contact.name }} {{ contact.surname }}</p>
                <p class="text">{{ contact.email }}</p>
            </div>
            <span class="unreads" v-if="contact.unread"> {{ contact.unread }} </span>
        </li>
    </ul>
</div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: []
        },
        messages: {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null
        }
    },
    methods: {
        selectContact(contact) {
            this.selected = contact;

            this.$emit('selected', contact);
        }
    },
    computed: {
        sortedContacts() {
            return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }

                return contact.unread;
            }]).reverse();
        },
        userLastCount() {
            return this.messages[this.lineData.length - 1].a;
        }
    }
}
</script>

<style lang="less" scoped>
@ct: #FF007A;
@lightgray: #FFA31A;
@bcmain: #17171A;
@unread: #FFA31A;
@f: #ffffff;

.contacts-list {
    flex: 2;
    max-height: 100vh;
    border-right: 1px solid @lightgray;

    ul {
        list-style: none;
        padding-left: 0;

        li {
            display: flex;
            height: 80px;
            position: relative;
            cursor: pointer;

            span.unreads {
                position: absolute;
                right: 20px;
                bottom: 5px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                min-height: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 50%;
                color: @lightgray;
                background: @unread;
            }

            &.selected {
                background-color: @lightgray;
            }

            .avatar {
                display: flex;
                flex: 1;
                align-items: center;

                img {
                    width: 64px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

            .contact {
                border-bottom: 1px solid @lightgray;
                flex: 3;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;
                    color: @f;

                    &.name {
                        font-weight: bold;
                        font-size: 16px;
                        color: @f;
                    }
                }
            }
        }
    }
}
</style>
