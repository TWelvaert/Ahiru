<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeLabel from "@/Components/Label.vue";
import Header from "@/Components/Header.vue";
//import Pagination from "@/Components/Pagination.vue";
import moment from "moment";
import { ref } from "vue";
//import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";

let data = defineProps({
    user: Array,
    categories: Array,
    collabs: Object
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                freelance advertisements
            </h2>
        </template>
        <div class="grid grid-cols-4 gap-4 m-14">
            
            
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
        </div>
        
        <Pagination :links="collabs.links" />
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