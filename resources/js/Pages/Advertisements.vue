<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeLabel from "@/Components/Label.vue";
import Header from "@/Components/Header.vue";
//import Pagination from "@/Components/Pagination.vue";
import moment from "moment";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";

let data = defineProps({
    user: Array,
    categories: Array,
    collabs: Array
});

let search = ref("");
watch(search, (value) => {
    Inertia.get(
        "/advertisements",
        { search: value },
        {
            preserveState: true,
        }
    );
});
</script>
<template>

    <Head title="freelance_advertisements" />
    <Dashboard :user="user">


        <div class="flex items-center justify-center flex-col">
            <input type="text" v-model="search" placeholder="Search..."
            class="border-white my-3 opacity-50 focus:border-white focus:ring-0 rounded-full bg-black text-l text-white h-10 pr-32 px-8" />
            <BreezeButton name="form1" class="ml-4">
                <a href="advertisement/create">Create</a>
            </BreezeButton>

        </div>

        <template #header>
            <h2 class="font-semibold text-gray-800 leading-tight">
                freelance advertisements
            </h2>
        </template>

        <!-- <div class="grid grid-cols-4 gap-4 m-14">
            <a v-for="collaboration in collabs" v-bind:href="
                '/advertisement/' +
                collaboration.collab.slug
            "
                class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                 <img v-bind:src="'uploads/'+ collaboration.uploads['name']" alt="" />
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ collaboration.collab.title }}
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-3">
                    {{ collaboration.collab.description }}
                </p>
                <small>{{ dateTime(collaboration.created_at) }}</small>
            </a>
        </div> -->

 <!-- <section class="mt-14 p-24 pl-26 "> -->
        <div class="grid grid-cols-4 gap-6 m-16 md:grid-cols-2 lg:grid-cols-4 ">
            <a v-for="collaboration in collabs" v-bind:href="
                '/advertisement/' +
                collaboration.collab.slug
            "
                    class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-10 ">
                    <div class="rounded-lg md:flex-row md:max-w-xl">
                        <img class="h-72" v-bind:src="'uploads/'+ collaboration.upload.name" alt="" />
                        <!-- Make dynamic -->
                        <button type="button"
                            class="mb-3 mt-3 inline-flex items-center px-1 py-0 border border-transparent text-sm rounded text-gray-500 bg-gray-100 hover:text-green-300 focus:outline-none transition ease-in-out duration-150">
                            <img class="h-7 w-7 m-1 rounded-full" src="../../assets/images/waterloop.gif" alt="">
                            advertisements.user
                            <!-- Make dynamic -->
                        </button>
                        <h5 class="text-2xl pb-6 text-gray-900 dark:text-white">
                            {{ collaboration.collab.title }}
                        </h5>
                        <p class="line-clamp-5 mb-5 text-gray-500">
                            {{ collaboration.collab.description }}
                        </p>
                        <hr>
                        <small>{{ dateTime(collaboration.created_at) }}</small>
                        <div class="mt-4">
                            <BreezeButton name="form1" class="">
                                <a href="advertisement/create">Read more</a>
                            </BreezeButton>
                        </div>

                    </div>
                </a>
            </div>

        <!-- <Pagination :links="collabs.links" /> -->
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
