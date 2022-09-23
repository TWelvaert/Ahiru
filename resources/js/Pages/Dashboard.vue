<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Header from "@/Components/Header.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>



<!-- Template -->

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <Header />


            <slot />


    </BreezeAuthenticatedLayout>
</template>

<script>

</script>
