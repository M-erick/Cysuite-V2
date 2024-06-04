<template>
    <AuthenticatedLayout>
        <div class="flex flex-col h-screen bg-gray-100"
            style=" font-family: 'Roboto Serif', serif;font-style: normal;font-weight:400;">
            <!-- here  i will display admin details such as name and his role -->

            <!-- SIDEBAR:will add my  inertia Links here-->
            <div class="flex-1 flex flex-wrap">
                <!-- SideBar  component -->
                <Sidebar />


                <div class="flex-1 p-4 w-full md:w-1/2">

                    <ChartCard />


                    <!-- Recent Guest Table:loop through database the first 5 : or i'll use pagination(5) in laravel -->

                    <RecentGuestTable />


                    <!-- recent admin components -->
                    <AdminTable />

                    <!-- Admin Average table -->
                    <AdminAverageRating />


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";


// defined components
import AdminTable from "@/Components/AdminComponents/AdminTable.vue";
import RecentGuestTable from "@/Components/AdminComponents/RecentGuestTable.vue";
import Sidebar from "@/Components/AdminComponents/Sidebar.vue";
import AdminAverageRating from "@/Components/AdminComponents/AdminAverageRating.vue";
import ChartCard from "@/Components/AdminComponents/ChartCard.vue";

</script>

<style>
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

button {
    background-color: #046a5b;
}
</style>
