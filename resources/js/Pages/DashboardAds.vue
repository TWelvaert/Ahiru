<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import Dashboard from "@/Pages/Dashboard.vue"
    // import { Welcome } from "@/Layouts/Welcome.js";

    let data = defineProps({
        collaborations: String,
    });
    </script>

    <template>
        <Head title="DashboardAds" />
        <Dashboard>

            <template #header>
                <div class="font-monument">
                <span id="welcome" class="flex items-center  justify-center">
                </span>
            </div>
            <span class="flex items-center justify-center">
                You have 14788 plays last 7 days
                </span>
            </template>
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-full bg-white rounded-lg border border-gray-200 shadow-md">
                    <div
                        class="bg-gray-600 overflow-hidden sm:rounded-lg  ">
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="advertisement in collaborations">
                                <td class="px-6 py-4 whitespace-nowrap ">
                                    <div class="flex items-center">
                                        <div
                                            class="text-sm font-monument text-gray-900"
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
                                        class="inline-flex border-spacing-1 border-1 border-color border-gray-400 shadow-sm items-center bg-green-300 hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased text-sm"
                                    >
                                        Published
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="inline-flex items-center bg-white hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased"
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

                                    <button class="inline-flex items-center bg-white hover:bg-black hover:text-white text-black  px-3 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
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
        
    </Dashboard>
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




