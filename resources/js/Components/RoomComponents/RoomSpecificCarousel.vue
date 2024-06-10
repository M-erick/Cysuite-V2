<template>
    <article class="mb-6 shadow">
        <div class="relative h-full w-full">
            <img class="h-full w-full object-cover" :src="getImageUrl(room.image)" alt="" />
        </div>
    </article>
</template>
<script setup>
const { room } = defineProps({
    room: {
        require: true
    }
})
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
    return imagePath
        ? `/storage/${imagePath}`
        : "https://via.placeholder.com/150";
}
</script>
