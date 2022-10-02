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
        
        <div>

            <div class="flex">
                <!-- <img src="../../../public/uploads/166472891087.jpg" alt="" class=" w-1/5  p-8 bg-white rounded-lg border border-gray-200 shadow-md"> -->
             
                 <img v-bind:src="'/uploads/' + advertisement.upload.name" alt="" class="w-1/5  p-8  bg-white rounded-lg border border-gray-200 shadow-md" />
                <div>
                <h2 class="text-3xl text-center p-8 bg-white rounded-lg border border-gray-200 shadow-md font-monument">{{ advertisement.collab.title }}</h2>
                <hr />
                <p class="text-xl text-center content-center items-center justify-center h-2/3 mx-48 py-24 ">{{ advertisement.collab.description }}</p>
                <a class="text-right " v-bind:href="'/profile/' + user.slug">
                <p class="px-24">{{ user.name }}</p>
                <p class="px-20">{{ dateTime(advertisement.collab.created_at) }}</p>
                </a>
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
