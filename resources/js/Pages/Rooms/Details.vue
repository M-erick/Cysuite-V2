<template>
    <div>
        <!-- component -->
        <link
            rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css"
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
                    class="bg-white p-6 mb-6 shadow group transform hover:-translate-y-2 hover:shadow-2xl rounded-2xl cursor-pointer border"
                >
                    <a
                        target="_self"
                        href="/blog/slug"
                        class="absolute opacity-0 top-0 right-0 left-0 bottom-0"
                    ></a>

                    <div class="w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class="flex flex-1">
                                <div class="">
                                    <p class="text-3xl">Single Rooms</p>
                                    <p class="text-sm font-semibold">
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Numquam dolorum
                                        repellendus aliquid ab provident cum ea,
                                        hic maiores autem, ducimus voluptates,
                                        officia necessitatibus exercitationem
                                        incidunt cupiditate ex natus facilis
                                        enim?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div></div>
                </article>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto"
                >
                    <article class="mb-6 shadow">
                        <div class="relative h-full">
                            <img
                                class="h-full w-full object-cover"
                                src="https://images.pexels.com/photos/163097/twitter-social-media-communication-internet-network-163097.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
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
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                            <div>
                                <i class="fas fa-award"></i>
                                <p>bedroom</p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </section>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
