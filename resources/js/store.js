import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        apiURL: 'http://localhost:8000/api',
        serverPath: 'http://localhost:8000'
    //     apiURL: 'http://127.0.0.1:8000/api',
    //     serverPath: 'http://127.0.0.1:8000'
    },

    // state: {
    //     apiURL: 'http://192.168.0.6:8000/api',
    //     serverPath: 'http://192.168.0.6:8000'
    // },

    // state: {
    //     apiURL: 'http://localhost:8000/api',
    //     serverPath: 'http://localhost:8000'
    // },
    mutations: {},
    actions: {}
})