<template>
<AuthenticatedLayout>
    <div>
    <h2>Edit Room</h2>
    <!-- <form @submit.prevent="updateRoom">
      <input v-model="editRoom.name" placeholder="Room Name" required>
      <input v-model="editRoom.type" placeholder="Room Type" required>
      <input v-model="editRoom.size" placeholder="Room Size" required>
      <input v-model="editRoom.price" placeholder="Room Price" required>
      <button type="submit">Update Room</button>
      <button @click="cancelEdit">Cancel</button>
    </form> -->
  </div>
</AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { reactive,ref,onMounted } from 'vue';


const editRoom = ref(null);
const editing = ref(false);

const updateRoom = async () => {
  await axios.put(`http://lr-cysuites.test/api/rooms/${editRoom.value.id}`, editRoom.value);
};

const cancelEdit = () => {
  editRoom.value = null;
  editing.value = false;
};

const props = defineProps({
  room: Object
});

onMounted(() => {
  editRoom.value = props.room;
  editing.value = true;
});
</script>

<style>

</style>
