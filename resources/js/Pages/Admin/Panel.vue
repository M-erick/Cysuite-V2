<template>
    <AuthenticatedLayout>
        <div class="flex flex-col h-screen bg-gray-100">
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
                            <i class="fas fa-user text-gray-500 mr-2"></i>Normal
                            Admin
                        </a>

                        <a
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#"
                        >
                            <i class="fas fa-home mr-2"></i>Admin Panel
                        </a>
                        <a
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#"
                        >
                            <i class="fas fa-file-alt mr-2"></i>Authorization
                        </a>
                        <a
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#"
                        >
                            <i class="fas fa-users mr-2"></i>Users
                        </a>
                        <a
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#"
                        >
                            <i class="fas fa-store mr-2"></i>Rooms
                        </a>
                        <a
                            class="block text-gray-500 py-2.5 px-4 my-4 rounded hover:bg-green-900 hover:text-white"
                            href="#"
                        >
                            <i class="fas fa-exchange-alt mr-2"></i>Issues
                        </a>
                    </nav>
                </div>

                <div class="flex-1 p-4 w-full md:w-1/2">
                    <div
                        class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0"
                    >
                        <div
                            class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2"
                        >
                            <h2
                                class="text-gray-500 text-lg font-semibold pb-1"
                            >
                                Users
                            </h2>
                            <hr class="font-semibold mt-3" />
                            <div
                                style="
                                    position: relative;
                                    height: 150px;
                                    width: 100%;
                                "
                            >
                                <p>work on adding user details here</p>
                            </div>
                        </div>

                        <div
                            class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2"
                        >
                            <h2
                                class="text-gray-500 text-lg font-semibold pb-1"
                            >
                                Rooms
                            </h2>
                            <hr class="font-semibold mt-3" />
                            <div
                                style="
                                    position: relative;
                                    height: 150px;
                                    width: 100%;
                                "
                            >
                                <p>
                                    work on adding Room count which admin is
                                    managing
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Guest Table:loop through database the first 5 : or i'll use pagination(5) in laravel -->
                    <div class="mt-8 bg-white p-4 shadow rounded-lg">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">
                            Recent Guest
                        </h2>
                        <div class="my-1"></div>
                        <hr class="font-semibold mb-5 mt-1" />
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Room
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Date In
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Date Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Erick</td>
                                    <td class="py-2 px-4 border-b">F31</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Ian</td>
                                    <td class="py-2 px-4 border-b">F32</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Terry</td>
                                    <td class="py-2 px-4 border-b">F33</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Chelsea</td>
                                    <td class="py-2 px-4 border-b">F34</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Fred</td>
                                    <td class="py-2 px-4 border-b">F35</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
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
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">
                            Admins
                        </h2>
                        <div class="my-1"></div>
                        <hr class="font-semibold mb-5 mt-1" />
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Room
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Date Assigned
                                    </th>
                                    <th
                                        class="py-2 px-4 font-bold uppercase text-sm border-b"
                                    >
                                        Date Out
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Erick</td>
                                    <td class="py-2 px-4 border-b">F31</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Ian</td>
                                    <td class="py-2 px-4 border-b">F32</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Terry</td>
                                    <td class="py-2 px-4 border-b">F33</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Chelsea</td>
                                    <td class="py-2 px-4 border-b">F34</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">Fred</td>
                                    <td class="py-2 px-4 border-b">F35</td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        27/07/2023
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
