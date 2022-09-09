<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

let data = defineProps({
    advertisement: String,
    uploads: Array,
});
const uploads = data["uploads"];

</script>

<template>
    <Head title="Advertisement" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Advertisement
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-20 sm:px-6 lg:px-8">
                <h2>{{ advertisement.title }}</h2>
                <hr />
                <p>{{ advertisement.description }}</p>

                <div v-for="upload in uploads" class="w-20">
                    <div v-if="upload['type'] === 'image'">
                        <img :src="`/${upload['path']}/${upload['name']}`" />
                    </div>
                    <div v-if="upload['type'] === 'audio'">
                        {{ upload['name'] }}
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>