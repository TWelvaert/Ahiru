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
        <BreezeAuthenticatedLayout>
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
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
                        <div class="my-4"></div>
                        <!-- Friends card -->
                        <div class="bg-white p-3 hover:shadow">
                            <div
                                class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8"
                            >
                                <span class="text-green-500">
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
                                </span>
                                <span>Following</span>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="text-center my-2">
                                    <img
                                        class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg"
                                        alt=""
                                    />
                                    <a href="#" class="text-main-color"
                                        >Artist</a
                                    >
                                </div>
                                <div class="text-center my-2">
                                    <img
                                        class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg"
                                        alt=""
                                    />
                                    <a href="#" class="text-main-color"
                                        >Artist</a
                                    >
                                </div>
                                <div class="text-center my-2">
                                    <img
                                        class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg"
                                        alt=""
                                    />
                                    <a href="#" class="text-main-color"
                                        >Artist</a
                                    >
                                </div>
                                <div class="text-center my-2">
                                    <img
                                        class="h-16 w-16 rounded-full mx-auto"
                                        src="../../assets/images/profileplaceholder.jpg"
                                        alt=""
                                    />
                                    <a href="#" class="text-main-color"
                                        >Artist</a
                                    >
                                </div>
                            </div>
                        </div>
                        <!-- End of friends card -->
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- Advertisements Section -->
                        <div class="">
                            <div
                                class="flex items-center space-x-2 font-semibold text-gray-900 leading-8"
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
                                <span class="tracking-wide"
                                    >Advertisements</span
                                >
                            </div>
                            <!-- <div class="text-gray-700">
                            <div class="grid md:grid-cols-3 text-sm">
                                <div v-for="collaboration in collaborations" class="grid grid-cols-3">
                                    <div class="px-4 py-2 font-semibold">{{ collaboration.slug }}</div>
                                        <td class="">
                                            <Link
                                                v-bind:href="
                                                    '/advertisement/' +
                                                    collaboration.slug +
                                                    '/edit'
                                                "
                                            >
                                                Update
                                            </Link>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">


                                            <Link
                                                v-bind:href="
                                                    '/dashboard/advertisement/delete/' +
                                                    collaboration.slug
                                                "
                                            >
                                                Delete
                                            </Link>

                                        </td>


                                </div>
                            </div>
                        </div> -->
                            <!-- Card -->
                            <div
                                class="rounded overflow-hidden shadow-lg bg-green-100"
                            >
                                <div class="">
                                    <div
                                        class="px-6 py-4 border-solid border-black flex-col"
                                    >
                                        <div
                                            v-for="collaboration in collaborations"
                                            class="flex-col"
                                        >
                                            <div>
                                                <img
                                                    src="../../assets/images/profileplaceholder.jpg"
                                                    class="object-cover h-40"
                                                />
                                                <div class="flex">
                                                    <a
                                                        v-bind:href="
                                                            '/advertisement/' +
                                                            collaboration.slug +
                                                            '/edit'
                                                        "
                                                    >
                                                        Update
                                                    </a>
                                                    <a
                                                        v-bind:href="
                                                            '/dashboard/advertisement/delete/' +
                                                            collaboration.slug
                                                        "
                                                    >
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-col">
                                                <div
                                                    class="px-4 py-2 font-semibold"
                                                >
                                                    {{ collaboration.slug }}
                                                </div>

                                                <p
                                                    class="text-gray-700 text-base line-clamp-5"
                                                >
                                                    {{
                                                        collaboration.description
                                                    }}
                                                </p>
                                            </div>
                                        </div>
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
                                    <div
                                        class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3"
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
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide"
                                            >Uploads</span
                                        >
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <li>
                                            <div class="text-teal-600">
                                                Song 1
                                            </div>
                                            <div class="text-gray-500 text-xs">
                                                Date of upload
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">
                                                Song 2
                                            </div>
                                            <div class="text-gray-500 text-xs">
                                                Date of upload
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">
                                                Song 3
                                            </div>
                                            <div class="text-gray-500 text-xs">
                                                Date of upload
                                            </div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">
                                                Song 4
                                            </div>
                                            <div class="text-gray-500 text-xs">
                                                Date of upload
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div
                                        class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3"
                                    >
                                        <span clas="text-green-500"> </span>
                                        <span class="tracking-wide"
                                            >Something ?</span
                                        >
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
        </BreezeAuthenticatedLayout>
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