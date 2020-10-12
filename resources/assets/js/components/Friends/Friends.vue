<template>
<div class="content">
    <FriendsList />
    <FriendsQuery />
</div>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            required: true
        }
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
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    background-color: @bcmain;
}
</style>
