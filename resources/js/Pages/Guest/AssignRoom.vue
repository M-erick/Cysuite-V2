<template>
    <AuthenticatedLayout>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Assign Rooms to Guest</h1>
            <form @submit.prevent="assignRooms" class="space-y-4">
                <div>
                    <label for="admin" class="block text-sm font-medium text-gray-700">Select Guest</label>
                    <select v-model="selectedGuest" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option v-for="guest in guests" :value="guest.id" :key="guest.id">{{ guest.name }}</option>
                    </select>
                </div>
                <div>
                    <label for="rooms" class="block text-sm font-medium text-gray-700">Select Rooms</label>
                    <select v-model="selectedRooms" multiple required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option v-for="room in rooms" :value="room.id" :key="room.id">{{ room.name }}</option>
                    </select>
                    <!-- 0713356146 -->
                </div>
                <div class="form-group">
          <label for="is_occupied">Occupied:</label>
          <input type="checkbox" id="is_occupied" v-model="isOccupied" >
        </div>
        <div>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" v-model="capacity" placeholder="Capacity" required>

        </div>

                <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2">Assign Rooms</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

  const selectedGuest = ref(null);
  const selectedRooms = ref([]);
  const guests = ref([]);
  const rooms = ref([]);

  const fetchGuests= async () => {
    try {
      const response = await axios.get('/api/guest');
      guests.value = response.data;
    } catch (error) {
      console.error('Error fetching Guests:', error);
    }
  };

  const fetchRooms = async () => {
    try {
      const response = await axios.get('/api/rooms');
      rooms.value = response.data;
    } catch (error) {
      console.error('Error fetching rooms:', error);
    }
  };

  const assignRooms = async () => {
    try {
      await axios.post('/api/guest', {
        user_id: selectedGuest.value,
        rooms: selectedRooms.value
      });
      await updateRoomOccupancy();
      console.log(selectedRooms.value);

    } catch (error) {
      console.error('Error assigning rooms:', error);
    }
  };

  const  isOccupied = ref(false);
  const capacity = ref('');
  const updateRoomOccupancy = async () => {
    for (const roomId of selectedRooms.value) {
        try {
            // Fetch the current room data
            const response = await axios.get(`/api/rooms/${roomId}`);
            const roomData = response.data;

            // Update the room data
            roomData.is_occupied = isOccupied.value;
            roomData.capacity = capacity.value;

            // then drop the image since there is i do not need of it
            delete roomData.image;

            // Send the updated room data back to the server
            await axios.put(`/api/rooms/${roomId}`, roomData);
        } catch (error) {
            console.error(`Error updating room ${roomId}:`, error);
        }
    }
};
  onMounted(() => {
    fetchGuests();
    fetchRooms();

  });
  </script>

  <style scoped>
  .container {
    max-width: 600px;
    margin: auto;
  }

  h1 {
    text-align: center;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label {
    margin-bottom: 5px;
  }

  select {
    padding: 10px;
    margin-bottom: 20px;
  }

  button {
    background-color: #4a90e2;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    background-color: #357ab8;
  }
  </style>
