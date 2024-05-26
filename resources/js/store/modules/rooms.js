
import axios from 'axios';

const state = {
    rooms: [],
    selectedRoom: null,
};

const mutations = {
    setRooms(state, rooms) {
        state.rooms = rooms;
    },
    setSelectedRoom(state, room) {
        state.selectedRoom = room;
    },
};

const actions = {
    async fetchRooms({ commit }) {
        try {
            const response = await axios.get('/api/rooms');
            commit('setRooms', response.data);
        } catch (error) {
            console.error('Error fetching rooms:', error);
        }
    },
   
};

const getters = {
    filteredRooms: (state) => (searchQuery) => {
        return state.rooms.filter(room =>
            room.description.toLowerCase().includes(searchQuery.toLowerCase())
        );
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
};
