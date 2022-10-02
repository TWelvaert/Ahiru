<script setup>
import Dashboard from '@/Pages/Dashboard.vue';
import moment from "moment";
import BreezeButton from "@/Components/Button.vue";


let data = defineProps({
    collabs: Array,
    latest_users: Array,
    latest_tracks: Array,
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
                <!-- <small class="mt-8">8 Advertisements available</small> -->
            </div>

            <!-- Card -->

            <div class="grid grid-cols-4 gap-6 m-16 md:grid-cols-2 lg:grid-cols-4 ">
                 <a v-for="advertisement in collabs" v-bind:href="'/advertisement/' + advertisement.collab.slug"
                    class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-10 ">
                    <div class="rounded-lg md:flex-row md:max-w-xl">
                        <img class="max-w- h-40 mb-3 mx-auto" v-bind:src="'uploads/'+ advertisement.uploads.name"
                            alt="">
                           <!-- {{ advertisement.collab.title }} -->

                        <button type="button"
                            class="mb-3 mt-3 inline-flex items-center px-1 py-0 border border-transparent text-sm rounded text-gray-500 bg-gray-100 hover:text-green-300 focus:outline-none transition ease-in-out duration-150">
                            <a v-bind:href="'profile/' + advertisement.user.slug">
                            <!-- <img class="h-7 w-7 m-1 rounded-full" v-bin:src="'uploads/' + collaboration.profile.profile_image" alt=""> -->
                            {{ advertisement.user.name }}
                              </a>
                            <!-- Make dynamic -->
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
                <!-- <small class="mt-8">3 Tracks available</small> -->
            </div>


    

                <section class="flex flex-row flex-wrap justify-center gap-4 m-14">
            <div v-for="track in latest_tracks">
                <div class="bg-gray-900 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72  h-52 block rounded" :src="'/uploads/'+track.image.name" alt="" />
                        <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <button v-on:click="$callMusicPlayer(track.audio.name, track.track_title, track.image.name, 0)" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">{{ track.track_title }}</h3>
                        <!-- <p class="text-gray-400">Tycho</p> -->
                    </div>
                </div>
            </div>
        </section>  



          

            <!-- CREATORS -->


            <div class="flex flex-col ml-16 mb-2 leading-tight">
                <span class="font-monument text-4xl">Recent Artists</span>
                <span class="mt-3">Most new artists of the moment </span>
                <!-- <small class="mt-8">8 Artists available</small> -->
            </div>

            <div class="grid grid-cols-4 gap-6 m-16 md:grid-cols-2 lg:grid-cols-4">
                <a v-for="user in latest_users" v-bind:href="'/profile/' +user.slug">
                <div class="w-72 h-auto bg-white border border-gray-200 shadow-md hover:bg-gray-10rounded-lg p-10   ">
                    <div class="flex flex-col gap-4 text-center items-center"> 
                        <img class="h-32 w-32 bg-white p-2 rounded-full shadow" v-bind:src="'/uploads/'+user.profile_image" alt="">
                        <p class="font-semibold">{{ user.name }}</p>
  
                        <!-- <div class="line-clamp-2 px-6 text-center mt-2 font-light text-sm">
                            <p>
                                {{ userProfile.profile.bio }}
                            </p> 
                        </div> -->
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
