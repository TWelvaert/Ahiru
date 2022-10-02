<script setup>

import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label.vue";
import TextareaVue from "@/Components/textarea.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeButton from "@/Components/Button.vue";

import { Head, useForm } from "@inertiajs/inertia-vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import moment from "moment";

let data = defineProps({
    user: Array,
    collaborations: Array,
    profile: String,
    followProfileData: Array,
    auth: Array
});

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
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->

                    <div class="w-full px-5 md:w-3/12 ">
                        <!-- Profile Card -->
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1">
                            <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide font-monument">PROFILE</span>
                                </div>
                        <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <div class="image overflow-hidden">
                                <img class="h-auto w-full mx-auto" v-bind:src="'/' + profile[0]['profile_image']" alt="" />

                            </div>
                            <h1
                                class="text-gray-900 font-bold text-xl leading-8 my-1"
                            >
                                Artist
                            </h1>
                            <h3
                                class="text-gray-900 font-bold text-xl leading-8 my-1"
                            >
                                {{ user.name }}
                            </h3>


                            <div v-if="auth.id == user.id && auth">
                            <form @submit.prevent="submit">
                                <div>
                                    <BreezeLabel
                                        for="bio"
                                        value="Bio"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                                    />
                                    <TextareaVue
                                        id="bio"
                                        type="textarea"
                                        class="border border-gray-200 p-2 w-full rounded"
                                        rows="6"
                                        v-model="form.profile[0]['bio']"
                                        required
                                    />
                                    <BreezeInputError class="mt-2" />
                                </div>
                                <Button class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased ml-4 "
                                    name="form"

                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update
                                </Button>
                            </form>

                           </div>
                           <div v-else>
                                    <h4 class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full">Bio</h4>
                                    <p>{{ profile[0]['bio'] }}</p>
                                </div>
                        </div>
                        <!-- End of profile card -->

                        <div class="my-4 flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1"><span class="">


                                    <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                                <span class="font-monument">FOLLOWING</span></div>
                        <!-- Following card -->
                        <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">

                            </div>
                            <div class="grid grid-cols-3 ">
                                <div v-for="followProfile in followProfileData" class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    v-bind:src="'/' + followProfile.profile.profile_image" alt="">
                                <a v-bind:href="
                                    '/profile/' +
                                    followProfile.follow.slug
                                ">{{ followProfile.follow.name }}</a>
                            </div>
                            </div>
                        </div>

                        <!-- End of following card -->

                    </div>
                    <!-- Right Side -->
                    <div class="w-full px-5 md:w-9/12 h-64">
                        <!-- Profile tab -->
                        <!-- Advertisements Section -->
                        <div class="">

                            <div class="flex items-center space-x-2 ">
                                <span clas="text-green-500">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 512 512">
<g>
</g>
	<path d="M256.010 128.738c121.887 0 221.942 38.574 221.942 85.811 0 23.368-24.894 44.186-64.993 59.934-10.168 3.563 25.877 105.636 14.224 108.697-11.714 3.041-71.639-92.457-85.34-90.419-26.409 4.567-55.378 6.605-85.832 6.605-121.897 0-221.962-38.605-221.962-84.818 0-47.237 100.065-85.811 221.962-85.811z" fill="#000000" />
</svg>
                                </span>
                                <span class="tracking-wide font-semibold text-gray-900 text-xl p-1 font-monument">ADVERTISEMENTS</span>
                                <div v-if="auth">
                                <div v-if="auth.id == user.id">
                                <button class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">

                                <a
                                    v-bind:href="
                                    '/dashboard/advertisements'
                                "
                                >
                                edit

                                </a>   </button>
                                </div>
                                </div>
                            </div>

    </div>
            <div class="grid grid-cols-1 content-center gap-8 md:grid-cols-4">

                    <a v-bind:href="
                        '/advertisement/'+
                        collaboration.slug
                            "
                    v-for="collaboration in collaborations"
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex-shrink-0 ">
                        <img src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                <div class="flex justify-between py-3">


                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white inline-block align-middle">{{ collaboration.title }}</h5>
                        <div v-if="auth">
                                        <div v-if="auth.id == user.id">
                        <button> <a class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased"
                                            v-bind:href="

                                                    '/advertisement/' +
                                                    collaboration.slug +
                                                    '/edit'
                                                "

>
                                                edit
                                            </a>
                </button>
                </div>
                </div>
                </div>
                        <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-5">{{ collaboration.description }}</p>
                        <small>{{ dateTime(collaboration.created_at) }}</small>
                    </a>
            </div>

                        <!-- End of Advertisements section -->

                        <div class="my-2 flex items-center space-x-3 font-semibold text-gray-900 text-xl">

                        <!-- Uploads and Something? -->
                        <span clas="">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide font-semibold text-gray-900 text-xl font-monument">UPLOADS</span>
                                    </div>
                        <div class="bg-white block p-6 max-w-sm rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full">

                            <div class="grid grid-cols-2">
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">

                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <li>
                                            <div class="text-teal-600">Song 1</div>
                                            <div class="text-gray-500 text-xs">Date of upload</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Song 2</div>
                                            <div class="text-gray-500 text-xs">Date of upload</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Song 3</div>
                                            <div class="text-gray-500 text-xs">Date of upload</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Song 4</div>
                                            <div class="text-gray-500 text-xs">Date of upload</div>
                                        </li>
                                    </ul>

                                </div>
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">

                                        </span>

                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <li>
                                            <div class="text-teal-600"></div>

                                            <div
                                                class="text-gray-500 text-xs"
                                            ></div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600"></div>
                                            <div
                                                class="text-gray-500 text-xs"
                                            ></div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End of Uploads and Something grid -->
                        </div>
                        <!-- End of profile tab -->
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
