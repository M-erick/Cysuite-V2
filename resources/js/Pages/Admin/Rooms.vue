<template>
    <div>
      <h1>Manage Rooms</h1>
      <button @click="fetchRooms">Load Rooms</button>
      <div v-if="rooms.length">
        <div v-for="room in rooms" :key="room.id">
          <h3>{{ room.name }}</h3>
          <p>Type: {{ room.type }}</p>
          <p>Size: {{ room.size }}</p>
          <p>Price: {{ room.price }}</p>
          <p>Status: {{ room.is_occupied ? 'Occupied' : 'Unoccupied' }}</p>
        </div>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import axios from 'axios';

  export default {
    setup() {
      const rooms = ref([]);

      const fetchRooms = async () => {
        const response = await axios.get('/api/rooms');
        rooms.value = response.data;
      };

      return { rooms, fetchRooms };
    },
  };
  </script>

  <style scoped>
  /* Add your styles here */
  </style>
