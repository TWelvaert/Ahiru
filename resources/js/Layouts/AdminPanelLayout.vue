<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";  
    import AdminSideBar from "@/Components/AdminSideBar.vue";  
    import { Head } from "@inertiajs/inertia-vue3";
</script>
    
<template>
    <Head title="Admin" />
    <BreezeAuthenticatedLayout>

        <div class="flex">
            <AdminSideBar class="flex-col" />
            <div>
                <slot />
            </div>
        </div>
        



    </BreezeAuthenticatedLayout>
</template>