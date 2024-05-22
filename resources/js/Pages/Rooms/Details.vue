<template>
    <AuthenticatedLayout>
        <!-- component -->

        <section class="relative bg-blueGray-50">
            <div
                class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75"
            >
                <div
                    class="absolute top-0 w-full h-full bg-center bg-cover"
                    :style="{
                        backgroundImage: `url(${getImageUrl(room.image)})`,
                    }"
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
                                    {{ room.name }}
                                </h1>
                                <p class="mt-4 text-lg text-blueGray-200">
                                    {{ room.type }}
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
                    class="bg-white p-6 mb-6 shadow group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border"
                >
                    <div class="w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class="flex flex-1">
                                <div class="">
                                    <p class="text-3xl">{{ room.name }}</p>
                                    <p class="text-sm font-semibold">
                                        {{ room.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 mt-4">
                        <Link
                            :href="route('rooms.edit', { id: room.id })"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg"
                        >
                            Update
                        </Link>
                        <button
                            @click="deleteRoom"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg"
                        >
                            Delete
                        </button>
                    </div>
                </article>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center items-center px-2 mx-auto"
                >
                    <article class="mb-6 shadow">
                        <div class="relative h-full w-full">
                            <img
                                class="h-full w-full object-cover"
                                :src="getImageUrl(room.image)"
                                alt=""
                            />
                        </div>
                    </article>
                    <!-- create a grid inside the the article below to contain room feature amenities  -->
                    <article class="bg-white p-6 mb-6">
                        <h3 class="font-bold text-3xl">Features & Amenities</h3>

                        <div
                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto"
                        >
                            <div>
                                <i class="fa-solid fa-bed"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-fan"></i>
                                <p>Air Conditioning</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-wifi"></i>
                                <p>WiFi</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-tv"></i>
                                <p>TV</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-phone"></i>
                                <p>Telephone</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-bath"></i>
                                <p>Bathrobes</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-mug-saucer"></i>
                                <p>Coffee Machine</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-martini-glass"></i>
                                <p>Mini-bar</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-restroom"></i>
                                <p>Bath Room</p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- dummy form details:update on this later DevEric -->
                <!-- component -->

                <div class="max-w-2xl m-4">
                    <h3 class="text-3xl font-medium mb-3">
                        Additional Services
                    </h3>
                    <div
                        class="p-4 max-w-md bg-white border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700"
                    >
                        <div class="flow-root">
                            <ul
                                role="list"
                                class="divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <i class="fas fa-award"></i>

                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Breakfast
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            +$100
                                            <span
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                /person/day</span
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <i class="fas fa-award"></i>

                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Half-board(breakfast + dinner or
                                                lunch)
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            +$120
                                            <span
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                /person/day</span
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <i class="fas fa-award"></i>
                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Full-board(breakfast+ dinner+
                                                lunch)
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            $220
                                            <span
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                /person/day</span
                                            >
                                        </div>
                                    </div>
                                </li>
                                <h2 class="mx-auto p-5 font-semibold">
                                    Other Services
                                </h2>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0 mt-8">
                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Wellness & Spa
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            $20 /person/day
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Fitness Center
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            +$15
                                            <span
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                /person/day</span
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p
                                                class="text-sm font-medium text-gray-900 truncate dark:text-white"
                                            >
                                                Parking
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white"
                                        >
                                            +$12
                                            <span
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                /person/day</span
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
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

async function deleteRoom() {
    try {
        await axios.delete(
            `http://lr-cysuites.test/api/rooms/${props.room.id}`
        );

        //   after delete we redirect user to  rooms page
        Inertia.visit(route("rooms"));
    } catch (error) {
        console.error("Failed to delete room:", error);
    }
}
</script>

<style></style>
