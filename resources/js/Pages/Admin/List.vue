<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Admin List</h1>
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-2">Name</th>
            <th class="py-2">Email</th>
            <th class="py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="admin in admins" :key="admin.id">
            <td class="py-2">{{ admin.name }}</td>
            <td class="py-2">{{ admin.email }}</td>
            <td class="py-2">
              <button @click="editAdmin(admin.id)" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</button>
              <button @click="deleteAdmin(admin.id)" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        admins: [],
      };
    },
    created() {
      this.fetchAdmins();
    },
    methods: {
      fetchAdmins() {
        axios.get('/api/admins')
          .then(response => {
            this.admins = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },
      editAdmin(id) {
        this.$router.push({ name: 'AdminEdit', params: { id } });
      },
      deleteAdmin(id) {
        if (confirm('Are you sure you want to delete this admin?')) {
          axios.delete(`/api/admins/${id}`)
            .then(() => {
              this.fetchAdmins();
            })
            .catch(error => {
              console.error(error);
            });
        }
      },
    },
  };
  </script>
