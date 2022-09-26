<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import moment from "moment";



let data = defineProps({
    user: Array,
    advertisements: String,
});


</script>

<template>
    <Dashboard>

        <section class="mt-14 ">

            <!-- ADVERTISEMENTS -->

            <!-- CARD -->

            <!-- HEADER ADS -->

            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">Advertisements</span>
                <span class="mt-3">These advertisements are the latest added to the Ahiru platform</span>
            </div>

            <!-- CARD -->

            <div class="grid grid-cols-4 gap-4 m-14">
                <a v-for="advertisement in advertisements"
                v-bind:href="
                                                    '/advertisement/' +
                                                    advertisement.slug
                                                "
                    class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                    advertisement.title }}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{{ advertisement.description }}
                    </p>
                    <small>{{ dateTime(advertisement.created_at) }}</small>

                </a>

            </div>

            <!-- MUSIC -->

            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">The Upload</span>
                <span class="mt-3">Newly posted tracks. Just for you</span>
            </div>


            <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 m-14">
                <!-- CARD 1 -->
                <div class="bg-gray-900 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72 block rounded"
                            src="https://upload.wikimedia.org/wikipedia/en/f/f1/Tycho_-_Epoch.jpg" alt="" />
                        <div
                            class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">Epoch</h3>
                        <p class="text-gray-400">Tycho</p>
                    </div>
                </div>

                <div class="bg-gray-900 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72 block rounded"
                            src="https://upload.wikimedia.org/wikipedia/en/c/ca/Tycho_-_Awake.png" alt="" />
                        <div
                            class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">Awake</h3>
                        <p class="text-gray-400">Tycho</p>
                    </div>
                </div>

                <div class="bg-gray-900 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72 block rounded"
                            src="https://upload.wikimedia.org/wikipedia/en/1/11/Dive_tycho_album.jpg" alt="" />
                        <div
                            class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">Dive</h3>
                        <p class="text-gray-400">Tycho</p>
                    </div>
                </div>
            </section>


            <!-- CREATORS -->


            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">Popular Artists</span>
                <span class="mt-3">Most streamed artists of the moment  </span>
            </div>

            <div class="flex gap-4 m-14 mt-32">
                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
                        </p>
                    </div>
                    <hr class="mt-8">
                    <div class="flex p-4">
                        <div class="w-1/2 text-center">
                            <span class="font-bold">1.8 k</span> Followers
                        </div>
                        <div class="w-0 border border-gray-300">

                        </div>
                        <div class="w-1/2 text-center">
                            <span class="font-bold">2.0 k</span> Following
                        </div>
                    </div>
                </div>


                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
                        </p>
                    </div>
                    <hr class="mt-8">
                    <div class="flex p-4">
                        <div class="w-1/2 text-center">
                            <span class="font-bold">1.8 k</span> Followers
                        </div>
                        <div class="w-0 border border-gray-300">

                        </div>
                        <div class="w-1/2 text-center">
                            <span class="font-bold">2.0 k</span> Following
                        </div>
                    </div>
                </div>


                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
                        </p>
                    </div>
                    <hr class="mt-8">
                    <div class="flex p-4">
                        <div class="w-1/2 text-center">
                            <span class="font-bold">1.8 k</span> Followers
                        </div>
                        <div class="w-0 border border-gray-300">

                        </div>
                        <div class="w-1/2 text-center">
                            <span class="font-bold">2.0 k</span> Following
                        </div>
                    </div>
                </div>


                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
                        </p>
                    </div>
                    <hr class="mt-8">
                    <div class="flex p-4">
                        <div class="w-1/2 text-center">
                            <span class="font-bold">1.8 k</span> Followers
                        </div>
                        <div class="w-0 border border-gray-300">

                        </div>
                        <div class="w-1/2 text-center">
                            <span class="font-bold">2.0 k</span> Following
                        </div>
                    </div>
                </div>
            </div>


        </section>


    </Dashboard>
</template>
<script>
export default {
    methods: {
        dateTime(value) {
            return moment(value).format("DD-MM-YYYY");
        },
    },
};
</script>
