<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm ml-4 text-black">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
