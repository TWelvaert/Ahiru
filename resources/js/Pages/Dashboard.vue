<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

let data = defineProps({
    advertisements: String,
});
</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            You're logged in!
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-200 border-b border-blue-500">
                        <button
                            class="px-3 py-1 mx-2 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">
                            Create Ads
                        </button>
                        <button
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">
                            Create Freelance Task
                        </button>
                    </div>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="advertisement in advertisements">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a v-bind:href="'/advertisement/' + advertisement.slug">
                                            {{ advertisement.title }}
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/" class="text-blue-500 hover:text-blue-600">Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <!-- <form
                            action="/admin/posts/{{ $post->id }}"
                            method="POST"
                        > -->
                                <!-- @csrf
                        @method('DELETE') -->

                                <button class="text-xs text-gray-400">
                                    Delete
                                </button>
                                <!-- </form> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>