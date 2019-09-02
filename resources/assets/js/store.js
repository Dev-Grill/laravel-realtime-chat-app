import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import userStore from './stores/UserStore';
import messagesStore from './stores/MessagesStore';

export default new Vuex.Store({
  modules: {
    userStore,
    messagesStore
  }
})
