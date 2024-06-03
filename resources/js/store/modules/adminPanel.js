import axios from 'axios';


const state = {
    totalUsers:0,
    availableRooms: 0,
    guestData: [],
    adminData: [],
    adminRatingData: [],
    isSupervisorAdmin: false,

};
const mutations = {
    setTotalUsers(state, value) {
        state.totalUsers = value;
      },
      setAvailableRooms(state, value) {
        state.availableRooms = value;
      },
      setGuestData(state, data) {
        state.guestData = data;
      },
      setAdminData(state, data) {
        state.adminData = data;
      },
      setAdminRatingData(state, data) {
        state.adminRatingData = data;
      },
      setIsSupervisorAdmin(state, value) {
        state.isSupervisorAdmin = value;
      },
};
const actions = {
    async fetchUserData({ commit }) {
      try {
        const response = await axios.get("/api/users");
        commit('setTotalUsers', response.data.length);
      } catch (error) {
        console.error("Error fetching total users:", error);
      }
    },

    async fetchAvailableRooms({ commit }) {
      try {
        const response = await axios.get("/api/rooms");
        const roomData = response.data;
        const availableRoom = roomData.filter((room) => !room.is_occupied);
        commit('setAvailableRooms', availableRoom.length);
      } catch (error) {
        console.error("error fetching available rooms", error);
      }
    },

    async fetchGuests({ commit }) {
      try {
        const response = await axios.get("/api/guest_rooms");
        commit('setGuestData', response.data);
      } catch (error) {
        console.error("error fetching guests", error);
      }
    },

    async fetchAdmins({ commit }) {
      try {
        const response = await axios.get("/api/admin_rooms");
        commit('setAdminData', response.data);
      } catch (error) {
        console.error("error fetching admins", error);
      }
    },

    async fetchAdminRatings({ commit }) {
      try {
        const response = await axios.get("/api/ratings");
        commit('setAdminRatingData', response.data);
      } catch (error) {
        console.error("error fetching admin ratings", error);
      }
    },

  };


export default {
    namespaced:true,
    state,
    mutations,
    actions,
}
