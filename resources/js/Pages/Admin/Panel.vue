<template>
    <AuthenticatedLayout>
        <div class="flex flex-col h-screen bg-gray-100">
            <!-- here  i will display admin details such as name and his role -->

            <!-- SIDEBAR:will add my  inertia Links here-->
            <div class="flex-1 flex flex-wrap">
                <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex" id="sideNav">
                    <nav>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#">
                            <i class="fa-solid fa-user-tie text-gray-500 mr-2"></i>{{currentUser.name}}
                        </a>

                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#">
                            <i class="fas fa-home mr-2"></i>Admin Panel
                        </a>


                        <Link :href="route('admins.create')"
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"> <i
                            class="fas fa-file-alt mr-2"></i>Assign Admin
                        </Link>

                        <Link :href="route('guest.assignRoom')"
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"> <i
                            class="fas fa-users mr-2"></i>Assign Guest
                        </Link>

                        <Link :href="route('rooms.create')"
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
                        <i class="fa-solid fa-house mr-2"></i>Add Room
                        </Link>



                        <Link :href="route('response')"
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
                        <i class="fas fa-exchange-alt mr-2"></i>Response
                        </Link>



                    </nav>
                </div>

                <div class="flex-1 p-4 w-full md:w-1/2">
                    <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                            <h2 class="text-gray-500 text-lg font-semibold pb-1" style="color: #046a5b;">
                                Users
                            </h2>
                            <hr class="font-semibold mt-3" style="border-color:#046a5b" />
                            <div class="flex items-center justify-center" style="height: 150px;">
                                <p class="text-center font-bold text-5xl">{{ totalUsers }}</p>
                            </div>
                        </div>


                        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                            <h2 class="text-gray-500 text-lg font-semibold pb-1" style="color: #046a5b;">
                              Available Rooms
                            </h2>
                            <hr class="font-semibold mt-3" style="border-color:#046a5b" />
                            <div class="flex items-center justify-center" style="height: 150px;">
                                <p class="text-center font-bold text-5xl">{{ availableRooms }}</p>
                            </div>
                        </div>

                    </div>

                    <!-- Recent Guest Table:loop through database the first 5 : or i'll use pagination(5) in laravel -->
                    <div class="mt-8 bg-white p-4 shadow rounded-lg">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">
                            Recent Guest
                        </h2>
                        <div class="my-1"></div>
                        <hr class="font-semibold mb-5 mt-1" />
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                                      ID
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-white  text-sm border-b">
                                        Name
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-white text-sm border-b">
                                        Email
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-white  text-sm border-b">
                                        Date In
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase  text-white text-sm border-b">
                                        Date Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="guest in guestData" :key="guest.id">
                                    <td class="py-2 px-4 border-b">{{guest.id}}</td>

                                    <td class="py-2 px-4 border-b">{{guest.name}}</td>
                                    <td class="py-2 px-4 border-b">{{ guest.email }}</td>
                                    <td class="py-2 px-4 border-b">
                                        {{ formatTimestamp(guest.created_at) }}
                                    </td>
                                    <td class="py-2 px-4 border-b font-bold " style="color:#046a5b">
                                      PENDING..
                                    </td>
                                </tr>




                            </tbody>
                        </table>

                        <div class="text-right mt-4">
                            <button class="bg-green-900 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                                View more
                            </button>
                        </div>
                    </div>
                    <div class="mt-8 bg-white p-4 shadow rounded-lg">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">
                            Admins
                        </h2>
                        <div class="my-1"></div>
                        <hr class="font-semibold mb-5 mt-1" />
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                                        Name
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                                        Room
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                                        Date Assigned
                                    </th>
                                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                                        Date Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Erick</td>
                                    <td class="py-2 px-4 border-b">F31</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Ian</td>
                                    <td class="py-2 px-4 border-b">F32</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Terry</td>
                                    <td class="py-2 px-4 border-b">F33</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Chelsea</td>
                                    <td class="py-2 px-4 border-b">F34</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Fred</td>
                                    <td class="py-2 px-4 border-b">F35</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-right mt-4">
                            <button class="bg-green-900 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                                View more
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { ref, onMounted } from 'vue';
import axios from 'axios';

const totalUsers = ref(0);
const availableRooms = ref(0);
const guestData = ref([]);
const { props } = usePage();
const currentUser = props.auth.user;
// use the name of the currently log in user:i see this as repeating my self:already have user:

const fetchuser = async()=>{
    try {
        const response = await axios.get('/api/users');
        totalUsers.value = response.data.length;
    } catch (error) {
        console.error('Error fetching total users:', error);
    }
};

// fetch available rooms
const fetchRoom = async () => {
    try {
        const response = await axios.get('/api/rooms');
        const roomData = response.data;

        // filter the fetched data using :Filter Hollah
        const availableRoom = roomData.filter(room => !room.is_occupied);
        availableRooms.value = availableRoom.length;


    } catch (error) {
        console.error('error fetching available rooms', error);
    }
};
const fetchAdmins = async()=>{
    try{
        const response = await axios.get('/api/guest');
        guestData.value = response.data;

        console.log(guestData.value);

    }catch(error){
        console.error('error fetching admin details',error);
    }

};
const formatTimestamp = (timestamp) => {
  const date = new Date(timestamp);
  const options = { hour: 'numeric', minute: 'numeric', day: 'numeric', month: 'long', year: 'numeric' };
  return date.toLocaleString(undefined, options);
};
onMounted(async()=>{
    await fetchuser();
    await fetchRoom();
    await fetchAdmins();
})
</script>

<style scoped>
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
</style>
