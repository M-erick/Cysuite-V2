<template>
      <AuthenticatedLayout>
  <div>
    <h2>Create Room</h2>
    <form @submit.prevent="createRoom">
      <input v-model="newRoom.name" placeholder="Room Name" required>
      <input v-model="newRoom.type" placeholder="Room Type" required>
      <input v-model="newRoom.size" placeholder="Room Size" required>
      <input v-model="newRoom.price" placeholder="Room Price" required>
      <button type="submit">Create Room</button>
    </form>
  </div>




</AuthenticatedLayout>
</template>

<script setup>
import { reactive ,ref} from 'vue';
import axios from 'axios';

import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const newRoom = ref({
  name: '',
  type: '',
  size: '',
  price: ''
});

const createRoom = async () => {
    // store the  data using post command
  await axios.post('http://lr-cysuites.test/api/rooms', newRoom);
};
</script>
<style>

</style>
