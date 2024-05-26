<template>
  <AuthenticatedLayout>
    <div class="flex flex-col h-screen bg-gray-100"  style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">
      <!-- here  i will display admin details such as name and his role -->

      <!-- SIDEBAR:will add my  inertia Links here-->
      <div class="flex-1 flex flex-wrap">
        <div
          class="p-2 bg-white w-full md:w-60 flex flex-col md:flex"
          id="sideNav"
        >
          <nav>
            <a
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
              href="#"
            >
              <i class="fa-solid fa-user-tie text-gray-500 mr-2"></i
              >{{ currentUser.name }}
            </a>

            <a
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
              href="#"
            >
              <i class="fas fa-home mr-2" style="color: #046a5b"></i>Admin Panel
            </a>

            <Link
              v-if="isSupervisorAdmin"
              :href="route('admins.create')"
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
            >
              <i class="fas fa-file-alt mr-2"></i>Assign Admin
            </Link>

            <Link
              :href="route('guest.assignRoom')"
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
            >
              <i class="fas fa-users mr-2"></i>Assign Guest Room
            </Link>

            <Link
              :href="route('rooms.create')"
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
            >
              <i class="fa-solid fa-house mr-2"></i>Add Room
            </Link>

            <Link
              :href="route('response')"
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
            >
              <i class="fas fa-exchange-alt mr-2"></i>Response
            </Link>

            <!-- <Link
              :href=" route('register')"
              class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
            >
              <i class="fas fa-exchange-alt mr-2"></i>Register
            </Link> -->
          </nav>
        </div>

        <div class="flex-1 p-4 w-full md:w-1/2">
          <div
            class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0"
          >
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
              <h2
                class="text-gray-500 text-lg font-semibold pb-1"
                style="color: #046a5b"
              >
                Users
              </h2>
              <hr class="font-semibold mt-3" style="border-color: #046a5b" />
              <div
                class="flex items-center justify-center"
                style="height: 150px"
              >
                <p class="text-center font-bold text-5xl">{{ totalUsers }}</p>
              </div>
            </div>

            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
              <h2
                class="text-gray-500 text-lg font-semibold pb-1"
                style="color: #046a5b"
              >
                Available Rooms
              </h2>
              <hr class="font-semibold mt-3" style="border-color: #046a5b" />
              <div
                class="flex items-center justify-center"
                style="height: 150px"
              >
                <p class="text-center font-bold text-5xl">
                  {{ availableRooms }}
                </p>
              </div>
            </div>
          </div>

          <!-- Recent Guest Table:loop through database the first 5 : or i'll use pagination(5) in laravel -->
          <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2 class="text-lg font-semibold pb-4" style="color: #046a5b">
              Recent Guest
            </h2>
            <div class="my-1"></div>
            <hr class="font-semibold mb-5 mt-1" style="border-color: #046a5b" />
            <table class="w-full table-auto text-sm">
              <thead>
                <tr class="text-sm leading-normal">
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    ID
                  </th>
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    Name
                  </th>
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    Email
                  </th>
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    Room
                  </th>
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    Date In
                  </th>
                  <th
                    class="py-2 px-4 font-bold uppercase text-white text-sm border-b"
                  >
                    Date Out
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="guest in guestData" :key="guest.id">
                  <td class="py-2 px-4 border-b">{{ guest.id }}</td>

                  <td class="py-2 px-4 border-b">{{ guest.username }}</td>
                  <td class="py-2 px-4 border-b">{{ guest.useremail }}</td>
                  <td class="py-2 px-4 border-b">{{ guest.assignedRooms }}</td>

                  <td class="py-2 px-4 border-b">
                    {{ formatTimestamp(guest.dateAssigned) }}
                  </td>
                  <td
                    class="py-2 px-4 border-b font-bold"
                    style="color: #046a5b"
                  >
                    PENDING..
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="text-right mt-4">
              <button
                class="bg-green-900 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded"
              >
                View more
              </button>
            </div>
          </div>
          <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2
              class="text-gray-500 text-lg font-semibold pb-4"
              style="color: #046a5b"
            >
              Admins
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
                    email
                  </th>
                  <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                    Room
                  </th>
                  <th class="py-2 px-4 font-bold uppercase text-sm border-b">
                    Date
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="admin in adminData" :key="admin.id">
                  <td class="py-2 px-4 border-b">{{ admin.id }}</td>

                  <td class="py-2 px-4 border-b">{{ admin.username }}</td>
                  <td class="py-2 px-4 border-b">{{ admin.useremail }}</td>

                  <td class="py-2 px-4 border-b">
                    {{ admin.assignedRooms }}
                  </td>
                  <td class="py-2 px-4 border-b">
                    {{ formatTimestamp(admin.dateAssigned) }}
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="text-right mt-4">
              <button
                class="bg-green-900 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded"
              >
                View more
              </button>
            </div>
          </div>

          <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2
              class="text-gray-500 text-lg font-semibold pb-4"
              style="color: #046a5b"
            >
             Average  Admin Rating
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
                  <td class="py-2 px-4 border-b">{{ rating.id }}</td>

                  <td class="py-2 px-4 border-b">{{ rating.username }}</td>

                  <td class="py-2 px-4 border-b">
                    {{ rating.rating }}
                  </td>

                </tr>
              </tbody>
            </table>

            <div class="text-right mt-4">
              <button
                class="bg-green-900 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded"
              >
                View more
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";

const totalUsers = ref(0);
const availableRooms = ref(0);
const guestData = ref([]);
const adminData = ref([]);
const adminRatingData = ref([]);

const { props } = usePage();
const currentUser = props.auth.user;
// use the name of the currently log in user:i see this as repeating my self:already have user:

const isSupervisorAdmin = ref(false);
// check role_id :if is supervisor_admin
isSupervisorAdmin.value = currentUser.role_id === 3 ? true : false;

const fetchuser = async () => {
  try {
    const response = await axios.get("/api/users");
    totalUsers.value = response.data.length;
  } catch (error) {
    console.error("Error fetching total users:", error);
  }
};

// fetch available rooms
const fetchRoom = async () => {
  try {
    const response = await axios.get("/api/rooms");
    const roomData = response.data;

    // filter the fetched data using :Filter Hollah
    const availableRoom = roomData.filter((room) => !room.is_occupied);
    availableRooms.value = availableRoom.length;
  } catch (error) {
    console.error("error fetching available rooms", error);
  }
};
const fetchGuests = async () => {
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
    }
    // console.log(guestRoomData);

    guestData.value = guestRoomData;
  } catch (error) {
    console.error("error fetching admin details", error);
  }
};

// fetch admin details:here i used table admin_rooms as pivot table,implement the same Idea in guests
const fetchAdmins = async () => {
  try {
    const response = await axios.get("/api/admin_rooms");
    // adminData.value = response.data;
    const adminRoomData = response.data;
    for (const admin of adminRoomData) {
      const adminRole = await axios.get(`/api/users/${admin.user_id}`);
      //  user's role and assign it to admin object
      admin.username = adminRole.data.name;
      admin.useremail = adminRole.data.email;
      admin.dateAssigned = adminRole.data.created_at;

      const assignedRooms = await axios.get(`/api/rooms/${admin.room_id}`);
      admin.assignedRooms = assignedRooms.data.name;
    }
    adminData.value = adminRoomData;
  } catch (error) {
    console.error("error fetching admin details", error);
  }
};

// Fetch Average Admin Rating
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

const formatTimestamp = (timestamp) => {
  const date = new Date(timestamp);
  const options = {
    hour: "numeric",
    minute: "numeric",
    day: "numeric",
    month: "long",
    year: "numeric",
  };
  return date.toLocaleString(undefined, options);
};

onMounted(async () => {
  await fetchuser();
  await fetchRoom();
  await fetchAdmins();
  await fetchGuests();
  await averageAdminRating();
  });
</script>

<style scoped>
table {
  border-collapse: collapse;
}

th,
td {
  padding: 0.5rem 1rem;
  border-bottom: 1px solid #e2e8f0;
  text-align: left;
}

th {
  background-color: #046a5b;
}
</style>
