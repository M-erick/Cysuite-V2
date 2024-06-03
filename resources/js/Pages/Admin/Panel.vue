<template>
    <AuthenticatedLayout>
        <div class="flex flex-col h-screen bg-gray-100"
            style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">
            <!-- here  i will display admin details such as name and his role -->

            <!-- SIDEBAR:will add my  inertia Links here-->
            <div class="flex-1 flex flex-wrap">
               <!-- SideBar  component -->
                <Sidebar/>


                <div class="flex-1 p-4 w-full md:w-1/2">
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

                    <!-- Recent Guest Table:loop through database the first 5 : or i'll use pagination(5) in laravel -->

                    <RecentGuestTable/>


                    <!-- recent admin components -->
                    <AdminTable/>

                    <!-- Admin Average table -->
                    <AdminAverageRating/>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";

// defined components
import AdminTable from "@/Components/AdminComponents/AdminTable.vue";
import RecentGuestTable from "@/Components/AdminComponents/RecentGuestTable.vue";
import Sidebar from "@/Components/AdminComponents/Sidebar.vue";
import AdminAverageRating from "@/Components/AdminComponents/AdminAverageRating.vue";
const totalUsers = ref(0);
const availableRooms = ref(0);
// const guestData = ref([]);




const { props } = usePage();
const currentUser = props.auth.user;
// use the name of the currently log in user:i see this as repeating my self:already have user:

const isSupervisorAdmin = ref(false);
// check role_id :if is supervisor_admin
isSupervisorAdmin.value = currentUser.role_id === 3 ? true : false;

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

<style>
table {
    border-collapse: collapse;
}

th,
td {
    padding: 0.5rem 1rem;
    border-bottom: 1px solid #e2e8f0;
    text-align: left;
}

th {
    background-color: #046a5b;
}

button {
    background-color: #046a5b;
}
</style>
