<template>
    <h3 class="flex justify-center items-center font-medium text-xl">
        <!-- this routes should be dynamic :i'lll add '/rooms/details+ room.id' -->
        <Link :href="'/rooms/details/' + room.id"
            class="flex justify-center items-center bg-opacity-80 z-10 top-0 left-0 w-full h-full rounded-2xl"
            style="color:#AD9551 ; font-family: 'Roboto Serif', serif;font-style: normal;">
        View All
        <i class="fa-solid fa-chevron-right pl-2"></i>
        </Link>
    </h3>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

const { room } = defineProps({
    room: {
        require: true,
    }
});
</script>
