<script setup>
    import Dashboard from "@/Pages/Dashboard.vue";
    import Uploads from "@/Plugins/Uploads.vue";

    let props = defineProps({
        user_uploads: Array,
        categories: Array,
        uploads: Array,
        showing: Boolean,
    });
</script>

<template>
    <Dashboard>
        <Uploads class="absolute min-h-full w-full left-0 top-0" :showing="showing = true"  @close="showing = false" @add_files="processFiles" :user_uploads="user_uploads" />              
    </Dashboard>
</template>