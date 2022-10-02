<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label.vue";
import TextareaVue from "@/Components/textarea.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeButton from "@/Components/Button.vue";
import { Link } from '@inertiajs/inertia-vue3';
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import moment from "moment";

let data = defineProps({
    user: Array,
    collaborations: Array,
    collabs: Array,
    profile: String,
    followProfileData: Array,
    auth: Array,
    profileImage: Array,
    latest_music: Array
});
console.log(data["latest_music"]);
const form = useForm({
    profile: data["profile"],
});

const submit = () => {
    form.post(`/profile/update/${data["user"]["slug"]}`);
};
// console.log(data['user']['slug']);
</script>
<template>

    <Head title="Profile" />
    <Dashboard>

        <div class="container mx-auto my-3 p-3">
            <div class="md:flex no-wrap md:-mx-2">
                <!-- Left Side -->

                <div class="w-full px-5 md:w-3/12">
                    <!-- Profile Card -->
                    <div
                        class="flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1"
                    >
                        <span clas="text-green-500">
                            <svg
                                class="h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                        </span>
                        <span class="tracking-wide">Profile</span>
                    </div>
                    <div
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                    >
                        <div class="image overflow-hidden">
                            <img
                                class="h-auto w-full mx-auto"
                                v-bind:src="'/uploads/' + profileImage.name"
                                alt=""
                            />
                        </div>
                        <h1
                            class="text-gray-900 font-bold text-xl leading-8 my-1"
                        >
                            Artist
                        </h1>

                        <div class="flex justify-between p-2">
                            <h3 class="text-gray-900 font-bold text-xl leading-8 my-1" >
                                {{ user.name }}  
                            </h3>
                            <Link class="cursor-pointer mt-1" v-bind:href="'/inbox/message/'+user.slug">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16"> <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/> </svg>
                            </Link> 
                        </div>

                        <div v-if="auth.id == user.id && auth">
                            <form @submit.prevent="submit">
                                <div>
                                    <BreezeLabel for="bio" value="Bio"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                                    <TextareaVue id="bio" type="textarea"
                                        class="border border-gray-200 p-2 w-full rounded" rows="6"
                                        v-model="form.profile[0]['bio']" required />
                                    <BreezeInputError class="mt-2" />
                                </div>
                                <Button

                                    class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black px-3 rounded-full font-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased ml-4"
                                    name="form"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update
                                </Button>
                            </form>
                        </div>
                        <div v-else>
                            <h4
                                class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                            >
                                Bio
                            </h4>
                            <p>{{ profile[0]["bio"] }}</p>
                        </div>
                    </div>
                    <!-- End of profile card -->

                    <div
                        class="my-4 flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1"
                    >
                        <!-- <span class="">
                            <svg
                                class="h-5 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                        </span> -->
                        <!-- <span>Following</span> -->
                    </div>
                    <!-- Following card -->
                    <!-- <div
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                    >
                        <div
                            class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8"
                        ></div>
                      <div class="grid grid-cols-3">
                            <div
                                v-for="followProfile in followProfileData"
                                class="text-center my-2"
                            >
                                <img
                                    class="h-16 w-16 rounded-full mx-auto"
                                    v-bind:src="
                                        '/' +
                                        followProfile.profile.profile_image
                                    "
                                    alt=""
                                />
                                <a
                                    v-bind:href="
                                        '/profile/' + followProfile.follow.slug
                                    "
                                    >{{ followProfile.follow.name }}</a
                                >
                            </div>
                        </div> 
                    </div>-->

                    <!-- End of following card -->
                </div>
                <!-- Right Side -->
                <div class="w-full px-5 md:w-9/12 h-64">
                    <!-- Profile tab -->
                    <!-- Advertisements Section -->
                    <div class="">
                        <div class="flex items-center space-x-2">
                            <span clas="text-green-500">
                                <svg
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 512 512"
                                >
                                    <g></g>
                                    <path
                                        d="M256.010 128.738c121.887 0 221.942 38.574 221.942 85.811 0 23.368-24.894 44.186-64.993 59.934-10.168 3.563 25.877 105.636 14.224 108.697-11.714 3.041-71.639-92.457-85.34-90.419-26.409 4.567-55.378 6.605-85.832 6.605-121.897 0-221.962-38.605-221.962-84.818 0-47.237 100.065-85.811 221.962-85.811z"
                                        fill="#000000"
                                    />
                                </svg>
                            </span>
                            <span
                                class="tracking-wide font-semibold text-gray-900 text-xl p-1"
                                >Advertisements</span
                            >
                            <div v-if="auth">
                                <div v-if="auth.id == user.id">
                                    <button
                                        class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black px-3 rounded-full font-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased"
                                    >
                                        <a
                                            v-bind:href="'/dashboard/advertisements'"
                                        >
                                            edit
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-1 content-center gap-8 md:grid-cols-4"
                    >
                        <div v-for="collab in collabs">
                            <a
                                v-bind:href="
                                    '/advertisement/' + collab.collab.slug
                                "
                                class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex-shrink-0"
                            >
                                <img
                                    v-bind:src="'/uploads/' + collab.upload.name"
                                    alt=""
                                />
                              
                                <div class="flex justify-between py-3">
                                    <h5
                                        class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white inline-block align-middle"
                                    >
                                        {{ collab.collab.title }}
                                    </h5>
                                    <div v-if="auth">
                                        <div v-if="auth.id == user.id">
                                            <button>
                                                <a
                                                    class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black px-3 rounded-full font-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased"
                                                    v-bind:href="
                                                        '/advertisement/' +
                                                        collab.collab.slug +
                                                        '/edit'
                                                    "
                                                >
                                                    edit
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p
                                    class="font-normal text-gray-700 dark:text-gray-400 line-clamp-5"
                                >
                                    {{ collab.collab.description }}
                                </p>
                                <small>{{
                                    dateTime(collab.collab.created_at)
                                }}</small>
                            </a>
                        </div>
                    </div>

                    <!-- End of Advertisements section -->

                    <div
                        class="my-2 flex items-center space-x-3 font-semibold text-gray-900 text-xl"
                    >
                        <!-- Uploads and Something? -->
                        <span clas="">
                            <svg
                                class="h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />
                            </svg>
                        </span>
                        <span
                            class="tracking-wide font-semibold text-gray-900 text-xl"
                            >Uploads</span
                        >
                    </div>
          
        
                    <section class="flex flex-row flex-wrap justify-start gap-4 m-14">
                        <div v-for="track in latest_music">
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


                              
                          

                </div>
            </div>
        </div>

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
