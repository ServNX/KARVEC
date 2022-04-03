import { createStore } from 'vuex';
import UIModule from './modules/ui';

import createPersistedState from 'vuex-persistedstate'

export default createStore({
    state: {},
    mutations: {},
    actions: {},
    getters: {},
    modules: {
        ui: UIModule
    },
    plugins:[
        createPersistedState()
    ],
});
