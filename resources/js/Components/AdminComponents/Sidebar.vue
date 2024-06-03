<template>

    <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex" id="sideNav">
        <nav>


            <Link :href="route('panel')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fas fa-home mr-2" style="color: #046a5b"></i>Admin Panel
            </Link>

            <!-- :href="route('panel')"  -->

            <Link v-if="isSupervisorAdmin" :href="route('admins.create')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fas fa-file-alt mr-2" style="color: #046a5b"></i>Assign Admin
            </Link>

            <Link :href="route('guest.assignRoom')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fas fa-users mr-2" style="color: #046a5b"></i>Assign Guest Room
            </Link>

            <Link :href="route('rooms.create')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fa-solid fa-house mr-2" style="color: #046a5b"></i>Add Room
            </Link>

            <Link :href="route('response')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fas fa-exchange-alt mr-2" style="color: #046a5b"></i>Response
            </Link>

            <Link :href="route('register')"
                class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white">
            <i class="fa-regular fa-address-card mr-2" style="color: #046a5b"></i>Register
            </Link>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

</script>

<style></style>
