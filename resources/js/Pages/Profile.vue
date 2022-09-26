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
                    <div class="w-full md:w-3/12 md:mx-2 ">
                    
                                           <!-- Profile Card -->
                        <div class="bg-white">
                            <div class="image overflow-hidden">
                                <img
                                    class="h-auto w-full mx-auto"
                                    src="../../assets/images/profileplaceholder.jpg"
                                    alt=""
                                />
                            </div>
                            <h1
                                class="text-gray-900 font-bold text-xl leading-8 my-1"
                            >
                                Artist
                            </h1>
                            <h3
                                class="text-gray-600 font-lg text-semibold leading-6"
                            >
                                {{ user.name }}
                            </h3>
                            <form @submit.prevent="submit">
                                <div>
                                    <BreezeLabel
                                        for="description"
                                        value="description"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                                    />
                                    <TextareaVue
                                        id="description"
                                        type="textarea"
                                        class="border border-blue-300 p-2 w-full rounded"
                                        rows="6"
                                        v-model="form.profile[0]['bio']"
                                        required
                                    />
                                    <BreezeInputError class="mt-2" />
                                </div>
                                <BreezeButton
                                    name="form"
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Update
                                </BreezeButton>
                            </form>
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm"
                            >
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"
                                        ><span
                                            class="bg-green-500 py-1 px-2 rounded text-white text-sm"
                                            >Active</span
                                        ></span
                                    >
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto">
                                        {{ dateTime(user.created_at) }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        
                        <!-- End of profile card -->
                        <div class="my-4 flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1"><span class="text-green-500">
                                    <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                                <span>Following</span></div>
                        <!-- Following card -->
                        <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="text-center my-2">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg" alt="">
                                    <a href="#" class="text-main-color">Artist</a>
                                </div>
                                <div class="text-center my-2">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg" alt="">
                                    <a href="#" class="text-main-color">Artist</a>
                                </div>
                                <div class="text-center my-2">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg" alt="">
                                    <a href="#" class="text-main-color">Artist</a>
                                </div>
                                <div class="text-center my-2">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg" alt="">
                                    <a href="#" class="text-main-color">Artist</a>
                                </div>
                            </div>
                        </div>
                    
                        <!-- End of following card -->

                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- Advertisements Section -->
                        <div class="">

                            <div class="flex items-center space-x-2 ">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide font-semibold text-gray-900 text-xl">Advertisements</span>
                                <a class="p-1 m-1 bg-green-500 py-1 px-2 rounded text-white text-sm"
                                    v-bind:href="
                                    '/dashboard/advertisements'
                                "
                                >
                                Edit
                                                
                                </a>
                            </div>
                            
    </div> 
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                   
                    <a v-bind:href="
                        '/advertisement/'+
                        collaboration.slug
                            "
                    v-for="collaboration in collaborations"
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex-shrink-0 ">
                        <img src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                <div class="flex justify-between py-3">
                    
                
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white inline-block align-middle">{{ collaboration.slug }}</h5>
                        <button> <a class="p-1 m-1 bg-green-500 py-1 px-2 rounded text-white text-sm"
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
                        <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{{ collaboration.description }}</p>
                        <small>{{ collaboration.created_at }}</small>
                    </a>
            </div> 
                        
                        <!-- End of Advertisements section -->
    
                        <div class="my-4 flex items-center space-x-3 font-semibold text-gray-900 text-xl py-1"></div>
    
                        <!-- Uploads and Something? -->
                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide font-semibold text-gray-900 text-xl">Uploads</span>
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


