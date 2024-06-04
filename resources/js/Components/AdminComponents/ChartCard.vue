<template>
    <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
            <h2 class="text-gray-500 text-lg font-semibold pb-1" style="color: #046a5b">
                Users
            </h2>
            <hr class="font-semibold mt-3" style="border-color: #046a5b" />
            <div class="flex items-center justify-center" style="height: 150px">
                <p class="text-center font-bold text-5xl">{{ totalUsers }}</p>
            </div>
        </div>

        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
            <h2 class="text-gray-500 text-lg font-semibold pb-1" style="color: #046a5b">
                Available Rooms
            </h2>
            <hr class="font-semibold mt-3" style="border-color: #046a5b" />
            <div class="flex items-center justify-center" style="height: 150px">
                <p class="text-center font-bold text-5xl">
                    {{ availableRooms }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const totalUsers = ref(0);
const availableRooms = ref(0);

const fetchTotalUsers = async () => {
    try {
        const response = await axios.get("/api/users");
        totalUsers.value = response.data.length;
    } catch (error) {
        console.error("Error fetching total users:", error);
    }
};
// fetch available rooms
const fetchRoomDetails = async () => {
    try {
        const response = await axios.get("/api/rooms");
        const roomData = response.data;

        // filter the fetched data using :Filter Hollah
        const availableRoom = roomData.filter((room) => !room.is_occupied);
        availableRooms.value = availableRoom.length;
    } catch (error) {
        console.error("error fetching available rooms", error);
    }
};
onMounted(async () => {
    await fetchTotalUsers();
    await fetchRoomDetails();
});
</script>

<style></style>
