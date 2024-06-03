<template>
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <h2 class="text-gray-500 text-lg font-semibold pb-4" style="color: #046a5b">
            Admins
        </h2>
        <div class="my-1"></div>
        <hr class="font-semibold mb-5 mt-1" style="border-color: #046a5b" />
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal text-white">
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        ID
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        Name
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        email
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        Room
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="admin in adminData.data" :key="admin.id">
                    <td class="py-2 px-4 border-b">{{ admin.id }}</td>

                    <td class="py-2 px-4 border-b">{{ admin.user.name }}</td>
                    <td class="py-2 px-4 border-b">{{ admin.user.email }}</td>

                    <td class="py-2 px-4 border-b">
                        {{ admin.room.name }}
                    </td>
                    <td class="py-2 px-4 border-b">
                        {{ formatTimestamp(admin.created_at) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-between mt-4">
            <button @click="prevOfAdminPage" :disabled="!adminData.prev_page_url"
                class=" hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                Previous
            </button>
            <button @click="nextOfAdminPage" :disabled="!adminData.next_page_url"
                class=" hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                Next
            </button>
        </div>


    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const adminData = ref({
    data: [],
    current_page: 1,
    last_page: 1,
    next_page_url: null,
    prev_page_url: null,

});

// fetch admin details:here i used table admin_rooms as pivot table,implement the same Idea in guests
const fetchAdminsDetails = async (page = 1) => {
    try {
        const response = await axios.get(`/api/admin_rooms?page=${page}`);
        // adminData.value = response.data;
        adminData.value = response.data;


    } catch (error) {
        console.error("error fetching admin details", error);
    }
};

const nextOfAdminPage = () => {
    if (adminData.value.next_page_url) {
        fetchAdminsDetails(adminData.value.current_page + 1);
    }
};

const prevOfAdminPage = () => {
    if (adminData.value.prev_page_url) {
        fetchAdminsDetails(adminData.value.current_page - 1);
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

onMounted(async () => {
    await fetchAdminsDetails();
});
</script>

<style>

</style>
