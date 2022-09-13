<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

    let data = defineProps({
        uploads_images: Array,
        uploads_audio: Array
    });

</script>
    
<template>
    <div class="bg-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Uploads
        </h2>

        <b>Images</b>
        <div v-for="image in data['uploads_images']">
            {{ image }}
        </div>

        <b>Audio</b>
        <div v-for="audio in data['uploads_audio']">
            {{ audio }}
        </div>
    </div>
</template>