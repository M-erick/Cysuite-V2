<template>
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <h2 class="text-gray-500 text-lg font-semibold pb-4" style="color: #046a5b">
            Average Admin Rating
        </h2>
        <div class="my-1"></div>
        <hr class="font-semibold mb-5 mt-1" style="border-color: #046a5b" />
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal text-white">
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        ID
                    </th>
                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        Name
                    </th>

                    <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                        Rating
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="rating in adminRatingData" :key="rating.id">
                    <td class="py-2 px-4 border-b">{{ rating.rated_user_id }}</td>

                    <td class="py-2 px-4 border-b">{{ rating.username }}</td>

                    <td class="py-2 px-4 border-b">
                        {{ rating.average_rating }}
                    </td>

                </tr>
            </tbody>
        </table>

        <div class="text-right mt-4">
            <button class=" hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                View more
            </button>
        </div>
    </div>
</template>

<script setup>
import{ref,onMounted} from "vue";

const adminRatingData = ref([]);

const averageAdminRating = async () => {
    try {
        const response = await axios.get("/api/ratings");
        const guestRoomData = response.data;
        for (const guest of guestRoomData) {
            const guestBooking = await axios.get(`/api/users/${guest.rated_user_id}`);
            //  user's role and assign it to admin object
            guest.username = guestBooking.data.name;


        }
        console.log(guestRoomData);

        adminRatingData.value = guestRoomData;
    } catch (error) {
        console.error("error fetching admin details", error);
    }
};
onMounted(async()=>{
  await averageAdminRating();
})

</script>

<style></style>
