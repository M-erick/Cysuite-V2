<template>
<AuthenticatedLayout>
    <div>
        <!-- component -->
        <link
            rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        />
        <link
            rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        />

        <section class="relative bg-blueGray-50">
            <div
                class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75"
            >
                <div
                    class="absolute top-0 w-full h-full bg-center bg-cover"
                    style="
                        background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80');
                    "
                >
                    <span
                        id="blackOverlay"
                        class="w-full h-full absolute opacity-75 bg-black"
                    ></span>
                </div>
                <div class="container relative mx-auto">
                    <div class="items-center flex flex-wrap">
                        <div
                            class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center"
                        >
                            <div class="pr-12">
                                <h1 class="text-white font-semibold text-5xl">
                                    Your story starts with us.
                                </h1>
                                <p class="mt-4 text-lg text-blueGray-200">
                                    Best ranked rooms
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                    style="transform: translateZ(0px)"
                >
                    <svg
                        class="absolute bottom-0 overflow-hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none"
                        version="1.1"
                        viewBox="0 0 2560 100"
                        x="0"
                        y="0"
                    >
                        <polygon
                            class="text-blueGray-200 fill-current"
                            points="2560 0 2560 100 0 100"
                        ></polygon>
                    </svg>
                </div>
            </div>
            <section class="pb-10 bg-white -mt-24">
                <article
                    class="bg-white p-6 mb-6 shadow group transform hover:shadow-2xl cursor-pointer border"
                >
                    <div class="w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class="flex flex-1">
                                <div class="">
                                    <!-- update this with data  fetched from database  -->
                                    <p class="text-3xl">Single Rooms</p>
                                    <p class="text-sm font-semibold">
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Numquam dolorum
                                        repellendus aliquid ab provident cum ea,
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div></div>
                </article>

                <!-- dummy form details:update on this later DevEric -->
                <!-- component -->
                <div class="bg-cover w-full flex justify-center items-center">
                    <div
                        class="w-full bg-white backdrop-filter backdrop-blur-lg"
                    >
                        <div
                            class="w-12/12 rounded-2xl bg-white p-2 bg-opacity-40"
                        >
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto"
                            >
                                <!-- the  article below should be dynamic ,i'll fetch  the data from the database -->

                                <article
                                    class="bg-white p-6 mb-2 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <Link
                                            class="flex justify-center items-center"
                                            href="/rooms/details"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </Link>
                                    </h3>
                                    <div></div>
                                </article>

                                <article
                                    class="bg-white p-6 mb-2 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <a
                                            class="flex justify-center items-center"
                                            href="/blog/slug"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </a>
                                    </h3>
                                    <div></div>
                                </article>

                                <article
                                    class="bg-white p-6 mb-2 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <a
                                            class="flex justify-center items-center"
                                            href="/blog/slug"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </a>
                                    </h3>
                                    <div></div>
                                </article>
                                <article
                                    class="bg-white p-6 mb-6 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <a
                                            class="flex justify-center items-center"
                                            href="/blog/slug"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </a>
                                    </h3>
                                    <div></div>
                                </article>
                                <article
                                    class="bg-white p-6 mb-6 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <a
                                            class="flex justify-center items-center"
                                            href="/blog/slug"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </a>
                                    </h3>
                                    <div></div>
                                </article>
                                <article
                                    class="bg-white p-6 mb-6 shadow rounded-2xl cursor-pointer border"
                                >
                                    <div class="relative rounded-2xl">
                                        <img
                                            class="w-full object-cover"
                                            src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                                            alt=""
                                        />
                                    </div>
                                    <div class="w-full pb-4 mb-auto">
                                        <div class="flex items-center">
                                            <div class="flex flex-1">
                                                <div class="">
                                                    <p class="text-3xl">
                                                        Single Rooms
                                                    </p>
                                                    <p
                                                        class="text-sm font-semibold"
                                                    >
                                                        Lorem ipsum dolor sit
                                                        amet consectetur
                                                        adipisicing elit.
                                                        Numquam dolorum
                                                        repellendus aliquid ab
                                                        provident cum ea, hic
                                                        maiores autem, ducimus
                                                        voluptates, officia
                                                        necessitatibus
                                                        exercitationem incidunt
                                                        cupiditate ex natus
                                                        facilis enim?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3
                                        class="flex justify-center items-center font-medium text-xl"
                                    >
                                        <!-- modify the href below -->
                                        <a
                                            class="flex justify-center items-center"
                                            href="/blog/slug"
                                            rel="invalid url"
                                        >
                                            View All
                                            <i
                                                class="fa-solid fa-chevron-right pl-2"
                                            ></i>
                                        </a>
                                    </h3>
                                    <div></div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

</script>

<style></style>
