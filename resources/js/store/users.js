const state = () => ({
        users: []
    });

const getters = {
    getUsers(state) {
        return state.users;
    }
}

const actions = {
    async loadUsers({ commit, state}) {
        fetch('/users/list')
            .then((resp) => {
                resp.json()
                    .then((data) => {
                        commit('setUsers', data)
                })
            })
    }
};

const mutations = {
    setUsers( state, users) {
        state.users = users;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
