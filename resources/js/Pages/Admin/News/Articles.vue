<script setup>
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import { Head, Link, Useform } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";

let data = defineProps({
    news_articles: Object,
});
</script>

<template>
    <Head title="Admin - News" />

    <AdminPanelLayout>
        <template #header>
            <div class="font-monument">
                <span class="flex items-center justify-center">
                    Hey {{ $page.props.auth.user.name }} how is your day?
                </span>
            </div>
            <span class="flex items-center justify-center">
                You have 14788 plays last 7 days
            </span>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-full">
                <div class="bg-gray-600 overflow-hidden sm:rounded-lg">
                    <div class="p-6 bg-gray-200 border-green-300">
                        <button
                            class="uppercase bg-green-300 hover:bg-black hover:text-white text-black py-3 px-8 rounded-full font-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased"
                        >
                            <a href="/admin/news/create">Create Article</a>
                        </button>
                    </div>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="news_article in news_articles.data">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        <a
                                            v-bind:href="
                                                '/news/article/' +
                                                news_article.slug
                                            "
                                        >
                                            {{ news_article.title }}
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"
                                >
                                    Published
                                </span>
                            </td>
                            <td class="text-blue-500 hover:text-blue-600">
                                <a
                                    v-bind:href="
                                        '/admin/news/' +
                                        news_article.slug +
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
                                            '/admin/news/' +
                                            news_article.slug +
                                            '/delete'
                                        "
                                    >
                                        Delete
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination class="mt-6" :links="news_articles.links" />
            </div>
        </div>
    </AdminPanelLayout>
</template>