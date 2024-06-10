<template>

    <article v-for="room in rooms" :key="room.id"
        class="bg-white p-3 mb-3 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
        <div class="relative mb-4 rounded-2xl">
            <img class="max-h-80 rounded w-full object-cover transition-transform duration-300 transform group-hover:scale-105"
                :src="getImageUrl(room.image) || 'https://via.placeholder.com/150'" alt="Room Image">
        </div>
        
        <div class="w-full pb-4 mb-auto">
            <div class="flex items-center">
                <div class="flex flex-1">
                    <div class="">
                        <p class="text-3xl" style=" font-family: 'Roboto Serif', serif;font-style: normal;">{{
                            room.type }} </p>

                        <!-- define the description part in the database {i need : description ,image,capacity} -->
                        <p class="text-sm font-semibold"
                            style=" font-family: 'Roboto Serif', serif;font-style: normal; font-weight: 300;">
                            {{ room.description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <VieAllButton :room="room"/>

    </article>
</template>

<script setup>
import VieAllButton from './VieAllButton.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const rooms = ref([]);

const fetchRooms = async () => {
    try {

        // default routes :http://lr-cysuites.test/api/rooms
        const response = await axios.get('/api/rooms');
        rooms.value = response.data;
    } catch (error) {
        console.error('Error fetching rooms:', error);
    }
};

// to get the image :try this logic
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
    return imagePath ? `/storage/${imagePath}` : 'https://via.placeholder.com/150';
}

onMounted(() => {
    fetchRooms();
});
</script>

