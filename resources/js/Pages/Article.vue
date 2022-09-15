<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

let data = defineProps({
    news_articles: String,
    uploads: Array,
});
const uploads = data["uploads"];
</script>

<template>
    <Head title="NewsArticle" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News Article
            </h2>
        </template>
        <div class="py-12 text-white">
            <div class="max-w-7xl mx-20 sm:px-6 lg:px-8">
                <h2>{{ news_articles.title }}</h2>
                <hr />
                <p>{{ news_articles.description }}</p>

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
    </BreezeAuthenticatedLayout>
</template>
