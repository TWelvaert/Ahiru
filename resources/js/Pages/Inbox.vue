<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";

let data = defineProps({
    user: Array,
    collaborations: String,
    categories: Array,
    freelance_advertisements: {
        type: Object,
        default: () => ({}),
    },
});

let search = ref("");
watch(search, (value) => {
    Inertia.get(
        "/advertisements",
        { search: value },
        {
            preserveState: true,
        }
    );
});
</script>

<template>
    <Dashboard :user="user">

        <!-- component -->

        <main class="flex w-full h-full shadow-lg rounded-3xl mt-8">
            <section class="flex flex-col w-2/12 bg-white rounded-l-3xl">
                <div
                    class="w-16 mx-auto mt-12 mb-20 p-4 bg-green-300 rounded-2xl text-white"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1"
                            d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"
                        />
                    </svg>
                </div>
            </section>
            <section
                class="flex flex-col pt-3 w-4/12 bg-gray-50 h-full overflow-y-scroll"
            >
                <label class="px-3">
                    <input
                        class="rounded-lg p-4 bg-gray-100 transition duration-200 focus:outline-none focus:ring-2 w-full"
                        placeholder="Search..."
                    />
                </label>

                <ul class="mt-6">
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                    <li class="py-5 border-b px-3 bg-green-300 text-white">
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md">23m ago</p>
                        </a>
                        <div class="text-md">You have been invited!</div>
                    </li>
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                    <li
                        class="py-5 border-b px-3 transition hover:bg-indigo-100"
                    >
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                </ul>
            </section>
            <section class="w-6/12 px-4 flex flex-col bg-white rounded-r-3xl">
                <div
                    class="flex justify-between items-center h-48 border-b-2 mb-8"
                >
                    <div class="flex space-x-4 items-center">
                        <div class="h-12 w-12 rounded-full overflow-hidden">
                            <img
                                src="https://bit.ly/2KfKgdy"
                                loading="lazy"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-semibold text-lg">Akhil Gautam</h3>
                            <p class="text-light text-gray-400">
                                akhil.gautam123@gmail.com
                            </p>
                        </div>
                    </div>
                    <div>
                        <ul class="flex text-gray-400 space-x-4">
                            <li class="w-6 h-6">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"
                                    />
                                </svg>
                            </li>
                            <li class="w-6 h-6">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </li>

                            <li class="w-6 h-6">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
                <section>
                    <h1 class="font-bold text-2xl">We need UI/UX designer</h1>
                    <article
                        class="mt-8 text-gray-500 leading-7 tracking-wider"
                    >
                        <p>Hi Akhil,</p>
                        <p>
                            Design and develop enterprise-facing UI and
                            consumer-facing UI as well as REST API backends.Work
                            with Product Managers and User Experience designers
                            to create an appealing user experience for desktop
                            web and mobile web.
                        </p>
                        <footer class="mt-12">
                            <p>Thanks & Regards,</p>
                            <p>Alexandar</p>
                        </footer>
                    </article>
                </section>
                <section class="mt-6 border rounded-xl bg-gray-50 mb-3">
                    <textarea
                        class="w-full bg-gray-50 p-2 rounded-xl"
                        placeholder="Type your reply here..."
                        rows="3"
                    ></textarea>
                    <div class="flex items-center justify-between p-2">
                        <button class="h-6 w-6 text-gray-400">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                />
                            </svg>
                        </button>
                        <button
                            class="bg-green-300 text-white px-6 py-2 rounded-xl"
                        >
                            Reply
                        </button>
                    </div>
                </section>
            </section>
        </main>
    </Dashboard>
</template>
