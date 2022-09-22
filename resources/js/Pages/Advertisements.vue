<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";

let data = defineProps({
    user: Array,
    collaborations: String,
    categories: Array,
    uploads: Array,
});

const form = useForm({
    title: data["title"],
    slug: data["slug"],
    description: data["description"],
    categories: data["categories"],
    uploads: data["uploads"],
});

console.log(data["categories"]);
const submit = () => {
    form.post(route("advertisement/create"));
};
</script>

<template>

    <Head title="collaborationss" />
    <BreezeButton name="form1" class="ml-4">
        <a href="advertisement/create">Create</a>
    </BreezeButton>
    <Dashboard>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                collaborations
            </h2>
        </template>
        <div class="py-12 text-white">
            <div v-for="category in categories" class="inline mx-2">

                <input type="checkbox" :for="category.name">

                <BreezeLabel :for="category.name" class="inline-block mb-2 ml-2 uppercase font-bold text-xs text-white">
                    {{ category.name }}</BreezeLabel>
            </div>
            <div v-for="collaboration in collaborations" class="max-w-7xl mx-20 sm:px-6 lg:px-8 mb-2">
                <a v-bind:href="
                '/advertisement/' +
                collaboration.slug"
                    class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-xl hover:bg-gray-100">
                    <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="" alt="" />
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ collaboration.title }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ collaboration.description }}
                        </p>
                    </div>
                </a>


                <!-- <div v-for="upload in uploads" class="w-20">
                    <div v-if="upload['type'] === 'image'">
                        <img :src="`/${upload['path']}/${upload['name']}`" />
                    </div>
                    <div v-if="upload['type'] === 'audio'">
                        {{ upload["name"] }}
                    </div>
                </div> -->
            </div>
        </div>
    </Dashboard>
</template>
