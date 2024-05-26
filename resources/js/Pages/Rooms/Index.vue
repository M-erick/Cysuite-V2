<template>
    <AuthenticatedLayout>

        <div class="relative pt-2 lg:pt-2 ">

            <article class="bg-white  mt-2 ml-3 mr-3 mb-3   group   cursor-pointer border">

                <div class="relative  ">
                    <img class="max-h-80  w-full object-cover  "
                        src="https://plus.unsplash.com/premium_photo-1661902745675-11846e4f9a41?q=80&w=2680&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">



                </div>


                <div>
                </div>
            </article>
            <article class="bg-white  p-6  ">


                <div class=" w-full pb-4 mb-auto">
                    <div class="flex items-center">

                        <div class="flex-1">
                            <div class="flex items-center justify-center">

                                <p class="text-3xl  "
                                    style="color:#AD9551;font-family: 'Cinzel Decorative',serif ;font-weight: 700;font-style: normal;">
                                    Rooms</p>



                            </div>
                            <p class="text-center px-2 font-semibold "
                                style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:200;">
                                Discover Our thoughtfully designed apartments </p>



                        </div>
                    </div>

                </div>

                <div>
                </div>
            </article>


        </div>
        <div class="bg-cover w-full flex justify-center items-center"
            style="background-image: url('/images/mybackground.jpeg');">
            <div class="w-full bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                <div class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">
                        <article v-for="room in rooms" :key="room.id"
                            class="bg-white p-3 mb-3 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                            <div class="relative mb-4 rounded">

                                <!-- I'll implement the  image part -->
                                <img class="max-h-80 rounded w-full object-cover transition-transform duration-300 transform group-hover:scale-105"
                                    :src="getImageUrl(room.image) || 'https://via.placeholder.com/150'"
                                    alt="Room Image">
                            </div>
                            <div class="w-full pb-4 mb-auto">
                                <div class="flex items-center">
                                    <div class="flex flex-1">
                                        <div class="">
                                            <p class="text-3xl"
                                                style=" font-family: 'Roboto Serif', serif;font-style: normal;">{{
                                                room.type }}  </p>

                                            <!-- define the description part in the database {i need : description ,image,capacity} -->
                                            <p class="text-sm font-semibold"
                                                style=" font-family: 'Roboto Serif', serif;font-style: normal; font-weight: 300;">
                                                {{ room.description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="flex justify-center items-center font-medium text-xl">
                                <!-- this routes should be dynamic :i'lll add '/rooms/details+ room.id' -->
                                <Link :href="'/rooms/details/'+ room.id"
                                    class="flex justify-center items-center bg-opacity-80 z-10 top-0 left-0 w-full h-full rounded-2xl"
                                    style="color:#AD9551 ; font-family: 'Roboto Serif', serif;font-style: normal;">
                                View All
                                <i class="fa-solid fa-chevron-right pl-2"></i>
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
        const response = await axios.get('/api/rooms');
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
