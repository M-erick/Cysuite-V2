<template>
<AuthenticatedLayout>
    <div>
        <h2>Update Room</h2>
        <form @submit.prevent="createRoom" class="room-form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" v-model="formData.name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" v-model="formData.description" placeholder="Description" required></textarea>
          </div>
          <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" id="type" v-model="formData.type" placeholder="Type" required>
          </div>
          <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" v-model="formData.price" placeholder="Price" required>
          </div>

          <div class="form-group">
          <label for="is_occupied">Occupied:</label>
          <input type="checkbox" id="is_occupied" v-model="formData.is_occupied">
        </div>

          <div class="form-group">
            <label for="size">Size:</label>
            <input type="number" id="size" v-model="formData.size" placeholder="Size" required>
          </div>
          <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" v-model="formData.capacity" placeholder="Capacity" required>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" @change="onFileChange" name="image" required>
          </div>
          <button type="submit">Create</button>
        </form>
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
