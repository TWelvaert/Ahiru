<script setup>
// import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';



defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Navbar />
    
</template>
