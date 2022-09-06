<template>
    <div class="m-auto" v-if="message && showNotification">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">SUCCESS! </strong>
            <span class="block sm:inline">{{ message }}</span>
        </div>
    </div>
</template>

<script setup>  

    import {ref, onMounted} from 'vue';

    const props = defineProps({
        message: String,
        type: String,
    });

    const showNotification = ref(false);

    onMounted(() => {
        showNotification.value = true;
        setTimeout(() => (showNotification.value = false), 2000);
    })

</script>