<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Dashboard from '@/Pages/Dashboard.vue';
import moment from "moment";

let data = defineProps({
    advertisement: String,
    upload: Array,
    user: Array
});

</script>

<template>
    <Head title="Advertisement" />
    <Dashboard>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-monument text-xl text-black leading-tight flex items-center justify-center">
                Advertisement
            </h2>

        </template>


        <div class="py-12 bg-white w-full sm:max-w-md mt-6 px-6 shadow-md overflow-hidden sm:rounded-lg flex items-center justify-center">

            <div class="max-w-7xl mx-20 sm:px-6 lg:px-8">
                <!-- <img src="../../../public/uploads/166454112748.jpg" alt=""> -->
             
                 <img v-bind:src="'/uploads/' + advertisement.upload.name" alt="" />
                <h2>{{ advertisement.collab.title }}</h2>
                <hr />
                <p>{{ advertisement.collab.description }}</p>
                <a v-bind:href="'/profile/' + user.slug">
                <p>{{ user.name }}</p>
                <p>{{ dateTime(advertisement.collab.created_at) }}</p>
                </a>
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
