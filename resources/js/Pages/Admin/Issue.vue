<template>
    <AuthenticatedLayout>
        <!-- try to implement this as a messaging system:facebook feeds -->
        <div class="container mx-auto shadow-lg rounded-lg">
            <!-- Chatting -->
            <div class="flex flex-row justify-between bg-white">
                <!-- chat list: i'll loop through issues and response from my issue  and Response table -->
                <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
                    <!-- search compt -->
                    <div class="border-b-2 py-4 px-2">
                        <input
                            type="text"
                            placeholder="search chatting"
                            class="py-2 px-2 border-2 border-gray-200 rounded-2xl w-full"
                        />
                    </div>
                    <!-- end search compt -->
                    <!-- user list:Fetch the user details from database -->
                    <div
                        class="flex flex-row py-4 px-2 items-center border-b-2"
                    >
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center"
                            >
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Ian</div>
                            <span class="text-gray-500"
                                >Am still waiting for new sheet i
                                requested</span
                            >
                        </div>
                    </div>
                    <!-- incase i decide to implement images instead of default fa-users i'll usecode below -->
                    <!-- <div class="flex flex-row py-4 px-2 items-center border-b-2">
                        <div class="w-1/4">
                            <img src="https://source.unsplash.com/otT2199XwI8/600x600"
                                class="object-cover h-12 w-12 rounded-full" alt="" />
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Chelsea</div>
                            <span class="text-gray-500">Hi,i have an issue with WIFI connections</span>
                        </div>
                    </div> -->

                    <div
                        class="flex flex-row py-4 px-2 items-center border-b-2"
                    >
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center"
                            >
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Chelsea</div>
                            <span class="text-gray-500"
                                >Am still waiting for new sheet i
                                requested</span
                            >
                        </div>
                    </div>
                    <!-- an active chat will have the setting border-b-2 border-l-4 border-green-900 -->
                    <div
                        class="flex flex-row py-4 px-2 items-center border-b-2 border-l-4 border-green-900"
                    >
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center"
                            >
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Frank</div>
                            <span class="text-gray-500"
                                >Am still waiting for new sheet i
                                requested</span
                            >
                        </div>
                    </div>

                    <div
                        class="flex flex-row py-4 px-2 items-center border-b-2"
                    >
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center"
                            >
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Terry</div>
                            <span class="text-gray-500"
                                >Am still waiting for new sheet i
                                requested</span
                            >
                        </div>
                    </div>
                    <div
                        class="flex flex-row py-4 px-2 items-center border-b-2"
                    >
                        <div class="w-1/4 mr-2">
                            <div
                                class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center"
                            >
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="text-lg font-semibold">Varis</div>
                            <span class="text-gray-500"
                                >Am still waiting for new sheet i
                                requested</span
                            >
                        </div>
                    </div>
                </div>

                <!-- end chat list -->
                <!-- message -->
                <div class="w-full px-5 flex flex-col justify-between">
                    <div class="flex flex-col mt-5">
                        <div class="flex justify-end mb-4">
                            <div
                                class="relative mr-2 py-3 px-4 bg-green-900 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
                            >
                                Am still waiting for new sheet I requested
                                <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full"
                                    >12:45 PM</span
                                >
                            </div>
                        </div>

                        <!-- response part:loop through the response  and replies-->
                        <div class="flex justify-start mb-4 font-semibold">
                            Admin@Username
                            <div
                                class=" relative ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
                            >
                                Hi Frank,am working on this
                                <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full"
                                    >12:45 PM</span
                                >

                            </div>
                        </div>
                        <div class="flex justify-end mb-4">
                            <div>
                                <div
                                    class=" relative mr-2 py-3 px-4 bg-green-900 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
                                >
                                    Okay.i'll be in my room from 6pm today
                                    evening
                                    <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full"
                                    >12:45 PM</span
                                >
                                </div>

                                <div
                                    class=" relative mt-4 mr-2 py-3 px-4 bg-green-900 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
                                >
                                    Something else.What was the room password
                                    <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full"
                                    >12:45 PM</span
                                >
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mb-4">
                            <span class="font-semibold"> Admin@User</span>

                            <div
                                class=" relative ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
                            >
                                Wifi name :CysuiteF33 and password is
                                @CysuiteCorp2021.
                                <span
                                    class="absolute bottom-0 left-0 text-xs text-gray-400 transform translate-y-full"
                                    >12:45 PM</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="py-5">
                        <!-- in this input form: i'll pass the issue to the database -->
                        <input
                            class="w-full bg-gray-300 py-5 px-3 rounded-xl"
                            type="text"
                            placeholder="type your message here..."
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

// endpoint to use
// 1.endpoint to implement the search functionality
//2.endpoint to post the response or issue to the database

</script>

<style></style>
