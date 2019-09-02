import Vue from "vue";
import store from './store';
import VueSocketIO from 'vue-socket.io'
import socketio from 'socket.io-client'

Vue.use(new VueSocketIO({
    debug: true,
    connection: socketio(':6999'),
}))
 
Vue.component('chat-component', require('./components/ChatComponent.vue').default);
Vue.component('chat-inbox-component', require('./components/InboxComponent.vue').default);
Vue.component('chat-message-component', require('./components/MessageComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
    created(){
    },
    mounted() {
        this.$store.dispatch('checkAuthUser', JSON.parse(localStorage.getItem("auth_user")));
    },
    methods: {
    },
});