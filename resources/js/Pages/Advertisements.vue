<template>
    <Head title="collaborationss" />

    <Dashboard :user="user">

        <div class="flex items-center justify-center flex-col">
        <BreezeButton name="form1" class="ml-4">
        <a href="advertisement/create">Create</a>
        </BreezeButton>
        <span class="mt-4">Create a card for collaborations</span>
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
