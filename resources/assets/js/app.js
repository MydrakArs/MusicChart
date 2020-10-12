
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Toastr from 'vue-toastr';

Vue.use(Toastr);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('auth', require('./components/StartPage/Auth.vue'));
Vue.component('starttext', require('./components/StartPage/StartText.vue'));
Vue.component('reg', require('./components/StartPage/Reg.vue'));
Vue.component('Message', require('./components/Chat/SocketChat.vue'));
Vue.component('Music', require('./components/Music/MusicMain.vue'));
Vue.component('Artists', require('./components/Music/Artists.vue'));
Vue.component('MusicMenu', require('./components/Music/MusicMenu.vue'));
Vue.component('ArtistsContent', require('./components/Music/ArtistsContent.vue'));
Vue.component('Profilefriend', require('./components/Profile/ProfileFriend.vue'));
Vue.component('Settings', require('./components/Profile/Settings.vue'));
Vue.component('Friends', require('./components/Friends/Friends.vue'));
Vue.component('FriendsQuery', require('./components/Friends/FriendsQuery.vue'))
Vue.component('FriendsList', require('./components/Friends/FriendsList.vue'));
Vue.component('notification', require('./components/Profile/Notification.vue'));
Vue.component('Unreadnots', require('./components/Profile/UnreadNots.vue'));
Vue.component('Imageuploader', require('./components/Profile/ImageUploader.vue'));
Vue.component('Search', require('./components/Search/Search.vue'));

import { store } from './store'


const app = new  Vue({
    el: '#app',
    store
});
