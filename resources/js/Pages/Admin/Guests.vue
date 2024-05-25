<template>
    <div>
      <h1>Guests</h1>
      <button @click="fetchGuests">Load Guests</button>
      <div v-if="guests.length">
        <div v-for="guest in guests" :key="guest.id">
          <h3>{{ guest.name }}</h3>
          <p>Email: {{ guest.email }}</p>
          <p>Role: {{ guest.role }}</p>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import axios from 'axios';

  export default {
    setup() {
      const guests = ref([]);

      const fetchGuests = async () => {
        const response = await axios.get('/api/users?role=guest');
        guests.value = response.data;
      };

      return { guests, fetchGuests };
    },
  };
  </script>

  <style scoped>
  /* Add your styles here */
  </style>
