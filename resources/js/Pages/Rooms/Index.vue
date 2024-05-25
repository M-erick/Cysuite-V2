<template>
    <AuthenticatedLayout>

<div class="relative pt-2 lg:pt-2 ">

    <article
                    class="bg-white  p-6 mb-6 shadow  group  rounded-2xl cursor-pointer border">
                    <a target="_self" href="/blog/slug"
                        class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></a>
                    <div class="relative mb-4 rounded-2xl">
                        <img class="max-h-80 rounded-2xl w-full object-cover  "
                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">



                    </div>


                    <div>
                    </div>
                </article>
                <article
                    class="bg-white  p-6  shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">


                    <div class=" w-full pb-4 mb-auto">
                        <div class="flex items-center">

                            <div class="flex-1">
                                <div class="flex items-center justify-center">
                                    <p class="text-3xl  "> Rooms</p>
                                </div>
                                <p class="text-sm font-semibold ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, quo.</p>

                            </div>
                        </div>

                    </div>

                    <div>
                    </div>
                </article>


</div>
<div class="bg-cover w-full flex justify-center items-center" style="background-image: url('/images/mybackground.jpeg');">
            <div class="w-full bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                <div class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">
                        <article v-for="room in rooms" :key="room.id" class="bg-white p-6 mb-6 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                            <div class="relative mb-4 rounded-2xl">

                                <!-- I'll implement the  image part -->
                                <img class="max-h-80 rounded-2xl w-full object-cover transition-transform duration-300 transform group-hover:scale-105"
                                    :src="getImageUrl(room.image) || 'https://via.placeholder.com/150'" alt="Room Image">
                            </div>
                            <div class="w-full pb-4 mb-auto">
                                <div class="flex items-center">
                                    <div class="flex flex-1">
                                        <div class="">
                                            <p class="text-3xl">{{ room.type }} Room </p>

                                            <!-- define the description part in the database {i need : description ,image,capacity} -->
                                            <p class="text-sm font-semibold">{{ room.description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="flex justify-center items-center font-medium text-xl">
                                <!-- this routes should be dynamic :i'lll add '/rooms/details+ room.id' -->
                                <Link :href="'/rooms/details/'+ room.id" class="flex justify-center items-center bg-opacity-80 z-10 top-0 left-0 w-full h-full text-black rounded-2xl">
                                    View All
                                    <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                    </svg>
                                </Link>
                            </h3>
                        </article>
                    </div>
                </div>
            </div>
        </div>
</AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from 'vue';
import axios from 'axios';

onMounted(() => {
    fetchRooms();
});

// room records
const rooms = ref([]);

const fetchRooms = async () => {
    try {

        // default routes :http://lr-cysuites.test/api/rooms
        const response = await axios.get('http://lr-cysuites.test/api/rooms');
        rooms.value = response.data;
        console.log(rooms.value);
    } catch (error) {
        console.error('Error fetching rooms:', error);
    }
};

// to get the image :try this logic
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
  return imagePath ? `/storage/${imagePath}` : 'https://via.placeholder.com/150';
}
</script>

<style>

</style>
