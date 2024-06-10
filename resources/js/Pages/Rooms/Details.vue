<template>
    <AuthenticatedLayout>
        <!-- component -->

        <section class="relative bg-blueGray-50">
            <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
                <div class="absolute top-0 w-full h-full bg-center bg-cover" :style="{
                    backgroundImage: `url(${getImageUrl(room.image)})`,
                }">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
                </div>
                <div class="container relative mx-auto">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                            <div class="pr-12">
                                <h1 class="text-white font-semibold text-5xl">
                                    {{ room.name }}
                                </h1>
                                <!-- <p class="mt-4 text-lg text-blueGray-200">
                                    {{ room.type }}
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <section class="pb-10 bg-white -mt-24">
                <article
                    class="bg-white p-6 mb-6 shadow group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                    <div class="w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class=" flex-1">
                                <div class="flex items-center justify-center">
                                    <!-- <p class="text-3xl">{{ room.name }}</p> -->
                                    <p class="text-sm font-semibold"
                                        style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">
                                        {{ room.description }}
                                    </p>

                                </div>
                                <p class="text-center px-2  pt-3 font-semibold"
                                    style="color:#AD9551; font-family: 'Cinzel Decorative',serif ;font-style: normal;font-weight:700;">
                                    Price: ksh {{ room.price }}
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center items-center px-2 mx-auto">
                    <article class="mb-6 shadow">
                        <div class="relative h-full w-full">
                            <img class="h-full w-full object-cover" :src="getImageUrl(room.image)" alt="" />
                        </div>
                    </article>
                    <!-- create a grid inside the the article below to contain room feature amenities  -->
                    <article class="bg-white p-6 mb-6">

                        <p class="text-center   pb-3 font-semibold"
                            style="color:#AD9551; font-family: 'Cinzel Decorative',serif ;font-style: normal;font-weight:700;font-size: 20px;">
                            {{ room.type }}
                        </p>
                        <FeaturesAndAmenities />

                    </article>
                </div>

                <!-- component -->
                <RoomAdditionalDetails />

            </section>
        </section>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FeaturesAndAmenities from '@/Components/RoomComponents/ FeaturesAndAmenities.vue';
import RoomAdditionalDetails from '@/Components/RoomComponents/RoomAdditionalDetails.vue';


const props = defineProps({
    room: Object,
});
// to get the image :try this logic
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
    return imagePath
        ? `/storage/${imagePath}`
        : "https://via.placeholder.com/150";
}
</script>

