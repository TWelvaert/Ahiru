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
            <div class="">
            <span class="flex items-center justify-center">
            Hey {{ $page.props.auth.user.name }} how is your day?
            </span>
        </div>
        <span class="flex items-center justify-center">
            You have 14788 plays last 7 days
            </span>
        </template>

        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div
                    class="bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 bg-gray-200 border-b border-blue-400">
                        <button
                            class="px-3 py-1 mx-2 border border-blue-400 rounded-full text-blue-400 text-xs uppercase font-semibold"
                        >
                            <a href="/advertisement/create">Colaborate</a>
                        </button>
                        <!-- <button
                            class="px-3 py-1 border border-blue-400 rounded-full text-blue-400 text-xs uppercase font-semibold"
                        >
                            Create Freelance Task
                        </button> -->
                    </div>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="advertisement in advertisements">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="text-sm font-medium text-gray-900"
                                    >
                                        <a
                                            v-bind:href="
                                                '/advertisement/' +
                                                advertisement.slug
                                            "
                                        >
                                            {{ advertisement.title }}
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
                                        '/advertisement/' +
                                         advertisement.slug +
                                        '/edit'
                                    "
                                >
                                    Update
                                </a>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                            >
                                <!-- <form
                            action="/admin/posts/{{ $post->id }}"
                            method="POST"
                        > -->
                                <!-- @csrf
                        @method('DELETE') -->

                                <button class="text-xs text-gray-400">
                                    <a
                                        v-bind:href="
                                            '/dashboard/advertisement/delete/' +
                                            advertisement.slug
                                        "
                                    >
                                        Delete
                                    </a>
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
