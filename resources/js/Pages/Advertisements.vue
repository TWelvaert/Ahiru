<template>

    <Head title="collaborationss" />

    <Dashboard :user="user">

        <div class="flex items-center justify-center flex-col">
            <BreezeButton name="form1" class="ml-4">
                <a href="advertisement/create">Create</a>
            </BreezeButton>
        </div>

        <div class="mb-2">
            <input type="text" v-model="search" placeholder="Search..."
                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5" />
        </div>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">collaborations</h2>
        </template>

        <div class="grid grid-cols-4 gap-4 m-14">
            <a href="#" v-for="collaboration in collaborations"
                class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <img src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                collaboration.title }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{{ collaboration.description }}
                </p>
                <small>{{ collaboration.created_at }}</small>
            </a>
        </div>
        <Pagination :data="collaborations" />

    </Dashboard>

</template>

<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeLabel from "@/Components/Label.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
//import Pagination from "@/Components/Pagination.vue";


let data = defineProps({
    user: Array,
    collaborations: String,
    categories: Array,
    collaborations: Array,
});

console.log(data['collaborations'])

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
    <Head title="collaborations" />
    <input
        v-model="search"
        type="text"
        placeholder="Search..."
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5"
    />

    <Dashboard :user="user">
        <BreezeButton name="form1" class="ml-4">
            <a href="advertisement/create">Create</a>
        </BreezeButton>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                collaborations
            </h2>
        </template>

        <div v-for="category in categories" class="flex items-center">
            <BreezeCheckbox
                :name="category.name"
                :id="category.id"
                v-model:checked="category.checked"
            />
            <BreezeLabel :for="category.id" :value="category.name" />
        </div>
        <div
            v-for="freelance_advertisement in freelance_advertisements.data"
            :key="freelance_advertisement.id"
            class="ml-20 flex space-x-4"
        >
            <div class="rounded-lg shadow-lg bg-white max-w-sm inline-block">
                <a href="#!">
                    <img
                        class="rounded-t-lg"
                        src="https://mdbootstrap.com/img/new/standard/nature/184.jpg"
                        alt=""
                    />µ
                </a>
                <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">
                        {{ freelance_advertisement.title }}
                    </h5>
                    <p class="text-gray-700 text-base mb-4">
                        {{ freelance_advertisement.description }}
                    </p>
                    <button
                        type="button"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                    >
                        Read More
                    </button>
                </div>
            </div>
        </div>

        <Pagination :data="freelance_advertisements" />
    </Dashboard>
</template>
