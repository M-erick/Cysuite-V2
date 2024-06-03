<template>
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <h2 class="text-lg font-semibold pb-4" style="color: #046a5b">
            Recent Guest
        </h2>
        <div class="my-1"></div>
        <hr class="font-semibold mb-5 mt-1" style="border-color: #046a5b" />
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        ID
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        Name
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        Email
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        Room
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        Date In
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                        Date Out
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="guest in guestData.data" :key="guest.id">
                    <td class="py-2 px-4 border-b">{{ guest.id }}</td>

                    <td class="py-2 px-4 border-b">{{ guest.user.name }}</td>
                    <td class="py-2 px-4 border-b">{{ guest.user.email }}</td>
                    <td class="py-2 px-4 border-b">{{ guest.room.name }}</td>

                    <td class="py-2 px-4 border-b">
                        {{ formatTimestamp(guest.created_at) }}
                    </td>
                    <td class="py-2 px-4 border-b font-bold" style="color: #046a5b">
                        PENDING..
                    </td>
                </tr>
            </tbody>
        </table>



        <div class="flex justify-between mt-4">
            <button @click="prevPage" :disabled="!guestData.prev_page_url"
                class=" hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                Previous
            </button>
            <button @click="nextPage" :disabled="!guestData.next_page_url"
                class=" hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                Next
            </button>
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const guestData = ref({
    data: [],
    current_page: 1,
    last_page: 1,
    next_page_url: null,
    prev_page_url: null,
});

const fetchGuestsDetails = async (page = 1) => {
    try {
        const response = await axios.get(`/api/guest_rooms?page=${page}`);
        guestData.value = response.data;

        console.log(guestData.value);



    } catch (error) {
        console.error("Error fetching guest details", error);
    }
};

// pagination using the previous and next button
const nextPage = () => {
    if (guestData.value.next_page_url) {
        fetchGuestsDetails(guestData.value.current_page + 1);
    }
};

const prevPage = () => {
    if (guestData.value.prev_page_url) {
        fetchGuestsDetails(guestData.value.current_page - 1);
    }
};

const formatTimestamp = (timestamp) => {
    const date = new Date(timestamp);
    const options = {
        hour: "numeric",
        minute: "numeric",
        day: "numeric",
        month: "long",
        year: "numeric",
    };
    return date.toLocaleString(undefined, options);
};

onMounted(async()=>{
    await fetchGuestsDetails();
});
</script>

<style></style>
