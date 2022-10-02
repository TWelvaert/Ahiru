<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import moment from "moment";
import BreezeButton from "@/Components/Button.vue";



let data = defineProps({
    collabs: Array, 
});

</script>

<template>
    <Dashboard>

        <section class="mt-14 p-24 pl-26 ">

            <!-- ADVERTISEMENTS -->

            <!-- Header advertisements -->

            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">Advertisements</span>
                <span class="mt-3">These advertisements are the latest added to the Ahiru platform</span>
                <small class="mt-8">8 Advertisements available</small>
            </div>

            <!-- Card -->

            <div class="grid grid-cols-4 gap-6 m-16 md:grid-cols-2 lg:grid-cols-4 ">
                 <a v-for="advertisement in collabs" v-bind:href="'/advertisement/' + advertisement.collab.slug"
                    class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-10 "> 
                    <div class="rounded-lg md:flex-row md:max-w-xl">
                        <img class="max-w- mb-3 mx-auto" v-bind:src="'uploads/'+ advertisement.uploads.name"
                            alt="">
                           {{ advertisement.collab.title }}
                        <!-- Make dynamic -->
                        <button type="button"
                        
                            class="mb-3 inline-flex items-center px-1 py-0 border border-transparent text-sm rounded text-gray-500 bg-gray-100 hover:text-green-300 focus:outline-none transition ease-in-out duration-150">
                            <a v-bind:href="'/profile/' + advertisement.user.slug">
                            <img class="h-7 w-7 m-1 rounded-full" v-bind:src="'uploads/' + advertisement.profile.profile_image" alt="">
                            {{ advertisement.user.name }}
                            </a>
                           
                            Make dynamic
                        </button>
                        <h5 class="text-2xl pb-6 text-gray-900 dark:text-white">
                            {{ advertisement.collab.title }}
                        </h5>
                        <p class="line-clamp-5 mb-5 text-gray-500">
                            {{ advertisement.collab.description }}

                        </p>
                        <hr>
                        <div class="mt-4">
                            <BreezeButton name="form1" class="">

                                <a v-bind:href="'/advertisement/' + advertisement.collab.slug">Read more</a>

                            </BreezeButton>
                        </div>

                    </div>
                </a>
            </div>




            <!-- MUSIC -->

            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">The Upload</span>
                <span class="mt-3">Newly posted tracks. Just for you</span>
                <small class="mt-8">3 Tracks available</small>
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
                <span class="mt-3">Most streamed artists of the moment </span>
                <small class="mt-8">8 Artists available</small>
            </div>

            <div class="grid grid-cols-4 gap-6 m-16 md:grid-cols-2 lg:grid-cols-4">
                <a v-for="userProfile in collabs" v-bind:href="
                    '/profile/' +
                    userProfile.user.slug
                ">

                <div class="w-72 h-auto bg-white border border-gray-200 shadow-md hover:bg-gray-10rounded-lg p-10   ">


                    <div class="flex flex-col gap-4 text-center items-center">
                        <img class="h-32 w-32 bg-white p-2 rounded-full shadow" mb-4 v-bind:src="userProfile.profile.profile_image"

                            alt="">
                        <p class="font-semibold">{{ userProfile.user.name }}</p>
                        <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                            <svg viewBox="0 0 24 24" class="mr-1" width="16" height="16" stroke="currentColor"
                                stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Los Angeles, California
                        </div>
                        <div class="line-clamp-2 px-6 text-center mt-2 font-light text-sm">
                            <p>
                                {{ userProfile.profile.bio }}
                            </p>
                        </div>
                    </div>
            </div>
        </a>
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
