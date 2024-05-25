<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Edit Admin</h1>
      <form @submit.prevent="updateAdmin" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" v-model="form.name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" v-model="form.email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" v-model="form.password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" v-model="form.password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>
        <div>
          <label for="room_id" class="block text-sm font-medium text-gray-700">Assign Room</label>
          <select v-model="form.room_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option v-for="room in rooms" :value="room.id" :key="room.id">{{ room.name }}</option>
          </select>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2">Update Admin</button>
      </form>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          room_id: '',
        },
        rooms: [],
      };
    },
    created() {
      this.fetchAdmin();
      this.fetchRooms();
    },
    methods: {
      fetchAdmin() {
        axios.get(`/api/admins/${this.$route.params.id}`)
          .then(response => {
            this.form = { ...response.data, password: '', password_confirmation: '' };
          })
          .catch(error => {
            console.error(error);
          });
      },
      fetchRooms() {
        axios.get('/api/rooms')
          .then(response => {
            this.rooms = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
      updateAdmin() {
        axios.put(`/api/admins/${this.$route.params.id}`, this.form)
          .then(() => {
            this.$router.push({ name: 'AdminList' });
          })
          .catch(error => {
            console.error(error);
          });
      },
    },
  };
  </script>
