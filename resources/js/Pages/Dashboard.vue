<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
// import { Welcome } from "@/Layouts/Welcome.js";

let data = defineProps({
    advertisements: String,
});
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="font-monument">
            <span id="welcome" class="flex items-center  justify-center">
            </span>

        </div>
        <span class="flex items-center justify-center">
            You have 14788 plays last 7 days
            </span>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-full ">
                <div
                    class="bg-gray-600 overflow-hidden sm:rounded-lg ">

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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
var i = 0;
var txt = 'Hey Creator how is your day?'; /* The text */
var speed = 150; /* The speed/duration of the effect in milliseconds */

export default {
    name: "App",
    mounted() {
        typeWriter();
        function typeWriter()
        {
            if (i < txt.length) {
                if (document.getElementById("welcome")){
                    document.getElementById("welcome").innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
        }
    }
}
</script>
