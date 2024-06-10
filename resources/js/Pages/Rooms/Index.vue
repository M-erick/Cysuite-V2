<template>
    <AuthenticatedLayout>

        <div class="relative pt-2 lg:pt-2 ">

            <Carousel />
            <article class="bg-white  p-6  ">
                <div class=" w-full pb-4 mb-auto">
                    <!-- This component should not be static ,update its functionality -->
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
            </article>


        </div>
        <div class="bg-cover w-full flex justify-center items-center">

            <div class="w-full bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                <div class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">
                        <RoomCard  />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RoomCard from '@/Components/RoomComponents/RoomCard.vue';
import Carousel from '@/Components/RoomComponents/Carousel.vue';
</script>


