export default {
    namespaced: true,
    state: () => ({
        modal: null
    }),
    getters: {
        modal (state) {
            return state.modal;
        }
    },
    mutations: {
        SET_MODAL (state, value) {
            state.modal = value;
        }
    },
    actions: {
        setModal ({ commit }, data) {
            commit('SET_MODAL', data);
        },
        showModal ({ state }) {
            state.modal.show();
        },
        hideModal ({ state }) {
            state.modal.hide();
        }

    }
};
