<template>

    <article v-for="room in rooms" :key="room.id"
        class="bg-white p-3 mb-3 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
        <div class="relative mb-4 rounded-2xl">

            <!-- I'll implement the  image part -->
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
        <h3 class="flex justify-center items-center font-medium text-xl">
            <!-- this routes should be dynamic :i'lll add '/rooms/details+ room.id' -->
            <Link :href="'/rooms/details/' + room.id"
                class="flex justify-center items-center bg-opacity-80 z-10 top-0 left-0 w-full h-full rounded-2xl"
                style="color:#AD9551 ; font-family: 'Roboto Serif', serif;font-style: normal;">
            View All
            <i class="fa-solid fa-chevron-right pl-2"></i>
            </Link>
        </h3>
    </article>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
const { rooms } = defineProps({
    rooms: {
        require: true,
        type: Array,

    }
});
// to get the image :try this logic
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
  return imagePath ? `/storage/${imagePath}` : 'https://via.placeholder.com/150';
}
</script>

<style></style>
