<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>

    <Head title="Welcome" />




    <div>
        <!-- component -->
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


        <section class="relative  bg-blueGray-50">
            <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
                <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://cysuites.com/assets/images/landing_page1.jpeg');
          ">
                    <span id="blackOverlay" class="w-full h-full absolute opacity-35 bg-black"></span>
                </div>


                <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end uppercase">

                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="font-semibold text-white     focus:outline focus:outline-2 focus:rounded-sm focus:outline-white"
                        style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;">Dashboard</Link>

                    <template v-else>
                        <Link :href="route('login')"
                            class="font-semibold text-white    focus:outline focus:outline-2 focus:rounded-sm focus:outline-white"
                            style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;">Log in
                        </Link>

                        <!-- <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold  text-white   focus:outline focus:outline-2 focus:rounded-sm focus:outline-white" style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;"
                    >Register</Link
                > -->
                    </template>
                </div>
                <div class="container relative mx-auto">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">



                            <div class="pr-12">

                                <h1 class="text-white font-semibold text-5xl pb-4"
                                    style="font-family: 'Cinzel Decorative',serif ;font-weight: 900;font-style: normal; ">
                                    Cysuite Apartments Hotel
                                </h1>



                                <h1 class="text-white font-semibold text-2xl uppercase"
                                    style="font-family: 'Roboto Serif',serif ;font-weight: 400;font-style: normal; ">
                                    More than just hotels Culture

                                </h1>
                                <p
                                    class="mt-10 font-semibold text-white transition duration-300 group transform hover:translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer">
                                    <i class="fa-solid fa-chevron-down" style="font-size: 40px"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <section class="pb-10 bg-white -mt-24">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap">
                        <div
                            class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center transition duration-300  transform hover:translate-y-4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full "
                                        style=" background-color:#AD9551;">

                                        <i class="fas fa-fingerprint"></i>
                                    </div>
                                    <h6 class="text-xl font-semibold"
                                        style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;">
                                        About Us
                                    </h6>
                                    <p class="mt-2 mb-4 text-blueGray-500">
                                        Cysuite has been welcoming guests to our spectacular destination in the most
                                        stunning style.
                                        Together we’ll explore the world and discover new places, possibilities and
                                        horizons.
                                        The very epitome of luxury, our brand is passionate about creating and crafting
                                        rich,
                                        meaningful and memorable experiences for every guest.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-4/12 px-4 text-center  transition duration-500  transform hover:-translate-y-2 ">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full"
                                        style=" background-color:#AD9551;">

                                        <i class="fas fa-award"></i>
                                    </div>
                                    <h6 class="text-xl font-semibold"
                                        style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;">
                                        Our Story
                                    </h6>
                                    <p class="mt-2 mb-4 text-blueGray-500">
                                        Across continent and decades, innovation and discovery has always guided the
                                        evolution of
                                        the Cysuite brand.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="pt-6 w-full md:w-4/12 px-4 text-center transition duration-300  transform hover:translate-y-4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                <div class="px-4 py-5 flex-auto">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full"
                                        style=" background-color:#AD9551;">
                                        <i class="fas fa-retweet"></i>
                                    </div>
                                    <h6 class="text-xl font-semibold"
                                        style="font-family: 'Roboto Serif',serif ;font-weight: 600;font-style: normal;">
                                        Review</h6>
                                    <p class="mt-2 mb-4 text-blueGray-500">
                                        At the heart of Cysuite is the remarkable team of people who look after each and
                                        every guest
                                        attentively and thoughtfully.

                                        we have a team waiting to welcome you and take care of everything you could wish
                                        for with
                                        warmth, charisma, care and attention to detail.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </section>
    </div>

</template>


<style>
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
