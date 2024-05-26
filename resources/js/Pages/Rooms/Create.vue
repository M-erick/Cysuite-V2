<template>
    <AuthenticatedLayout>
      <div>
        <h2>Create Room</h2>
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
  import { ref } from 'vue';
  import axios from 'axios';
  import { Link } from "@inertiajs/vue3";
  import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

  const formData = ref({
    name: '',
    type: '',
    size: '',
    price: '',
    description: '',
    image: null,
    capacity: '',
    is_occupied: false
  });

  function onFileChange(event) {
    const file = event.target.files[0];
    formData.value.image = file;
  }

  async function createRoom() {
    try {
      const formDataObj = new FormData();
      formDataObj.append('name', formData.value.name);
      formDataObj.append('type', formData.value.type);
      formDataObj.append('size', formData.value.size);
      formDataObj.append('price', formData.value.price);
      formDataObj.append('description', formData.value.description);
      formDataObj.append('image', formData.value.image);
      formDataObj.append('capacity', formData.value.capacity);
      formDataObj.append('is_occupied', formData.value.is_occupied ? 1 : 0);

      await axios.post(`/api/rooms`, formDataObj, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });

    //   After successful submission : i need a  redirect route
    } catch (error) {
      console.error('Failed to create room:', error.response || error.message);
    }
  }
  </script>

  <style scoped>
  h2 {
    text-align: center;
    padding-top: 10px;
    padding-bottom: 2px;
  }

  .room-form {
    max-width: 400px;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  button {
    display: block;
    background-color: crimson;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    background-color: #0056b3;
  }
  </style>
