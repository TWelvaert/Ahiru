
<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import Dashboard from '@/Pages/Dashboard.vue';

let data = defineProps({
    user: Array,
    collaborations: Array,
});



// const form = useForm({
//     title: data["title"],
//     slug: data["slug"],
//     description: data["description"],
//     categories: data["categories"],
//     uploads: data["uploads"],
// });
// console.log(data["user"]);


</script>
<template>

    <Head title="Profile" />
    <Dashboard>
    <BreezeAuthenticatedLayout>



        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto" src="../../assets/images/profileplaceholder.jpg" alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Artist</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Short Bio sentence </h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">Nov 07, 2016</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-green-500">
                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>Following</span>
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
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- Advertisements Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Advertisements</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">

                                    </div>
                                    <div class="px-4 py-2"></div>
                                </div>
                                <div v-for="collaboration in collaborations" class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">{{ collaboration.slug }}</div>
                                    <td class="text-blue-500 hover:text-blue-600">
                                    <a
                                        v-bind:href="
                                            '/advertisement/' +
                                            collaboration.slug +
                                            '/edit'
                                        "
                                    >
                                        Update
                                    </a>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                >

                                    <button class="text-xs text-gray-400">
                                        <a
                                            v-bind:href="
                                                '/dashboard/advertisement/delete/' +
                                                collaboration.slug
                                            "
                                        >
                                            Delete
                                        </a>
                                    </button>
                                </td>

                                    <div class="px-4 py-2"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of Advertisements section -->

                    <div class="my-4"></div>

                    <!-- Uploads and Something? -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Uploads</span>
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
                                    <span class="tracking-wide">Something ?</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600"></div>
                                        <div class="text-gray-500 text-xs"></div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600"></div>
                                        <div class="text-gray-500 text-xs"></div>
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

        </BreezeAuthenticatedLayout>
    </Dashboard>
</template>
