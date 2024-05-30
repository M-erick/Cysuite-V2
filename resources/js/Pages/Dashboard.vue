<template>
    <AuthenticatedLayout>

        <div class="relative pt-2 lg:pt-2 ">
            <article class="bg-white  mt-2 ml-3 mr-3 mb-3  group   cursor-pointer border">
                <a target="_self" href="/blog/slug" class="absolute opacity-0 top-0 right-0 left-0 bottom-0"></a>
                <div class="relative ">
                    <img class="max-h-80  w-full object-cover  "
                        src="https://mediaassets.cbre.com/cdn/-/media/project/cbre/dotcom/global/services/property-types/hotels/hotels-topic-hero.jpeg?iar=0&rev=501dfba27e9e4e03a4e8af6428fb01bc&key=topichero-default&device=desktop"
                        alt="">



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

                                <p class="text-3xl  "
                                    style="color:#AD9551;font-family: 'Cinzel Decorative',serif ;font-weight: 400;font-style: normal;">
                                    Current Room Booking</p>



                            </div>
                            <p class="text-center px-2 font-semibold "
                                style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:200; font-size:20px;">
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
                    <div v-if="roomFetched"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto">
                        <article v-for="room in roomData" :key="room.id"
                            class="bg-white p-3 mb-3 shadow transition duration-300 group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border">
                            <div class="relative mb-4 rounded-2xl">

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
                                                    room.type }}</p>

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
                                <Link :href="'/rooms/details/' + room.room_id"
                                    class="flex justify-center items-center  z-10 top-0 left-0 w-full h-full  "
                                    style="color:#AD9551 ;font-family: 'Roboto Serif', serif;font-style: normal;">
                                View All
                                <i class="fa-solid fa-chevron-right pl-2"></i>
                                </Link>
                            </h3>
                        </article>
                    </div>
                    <div v-else style="display: flex; align-items: center;">
                        <p
                            style="font-family: 'Cinzel Decorative', serif; font-style: normal; font-weight: 700; margin-right: 10px; color:#AD9551;">
                            Loading ...</p>
                        <img class="h-10 w-10" src="https://icons8.com/preloaders/preloaders/1488/Iphone-spinner-2.gif"
                            alt="">
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
import { usePage } from "@inertiajs/vue3";
import axios from 'axios';

// user data
const { props } = usePage();
const currentUser = props.auth.user;
// console.log(currentUser);
const roomFetched = ref(false);
onMounted(async () => {
    await fetchUserBookings();

});


const roomData = ref([]);

const fetchUserBookings = async () => {
    try {
        const response = await axios.get("/api/guest_rooms");
        const guestRoomData = response.data;
        for (const guest of guestRoomData) {
            const guestBooking = await axios.get(`/api/users/${guest.user_id}`);
            //  user's role and assign it to admin object
            guest.username = guestBooking.data.name;
            guest.useremail = guestBooking.data.email;
            guest.dateAssigned = guestBooking.data.created_at;

            const assignedRooms = await axios.get(`/api/rooms/${guest.room_id}`);
            guest.assignedRooms = assignedRooms.data.name;
            guest.image = assignedRooms.data.image;
            guest.description = assignedRooms.data.description;
            guest.type = assignedRooms.data.type;

        }
        // Filter out guest bookings for the current user
        const currentUserBookings = guestRoomData.filter(guest => guest.user_id === currentUser.id);

        console.log(currentUserBookings);
        roomFetched.value = true;
        roomData.value = currentUserBookings;
    } catch (error) {
        console.error("error fetching data details", error);
    }
};



// to get the image :try this logic
function getImageUrl(imagePath) {
    // i'll create a tenary statement if-else
    return imagePath ? `/storage/${imagePath}` : 'https://via.placeholder.com/150';
}
</script>

<style></style>
