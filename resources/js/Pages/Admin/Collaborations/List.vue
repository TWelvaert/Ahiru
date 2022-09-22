<script setup>
    import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";  
    import { Link } from '@inertiajs/inertia-vue3';

    let data = defineProps({
        collabs: Array,
    });

</script>
    
<template>
    <AdminPanelLayout>
        Collaborations List
        <table v-for="collab in collabs.data">
            <tr>
                <td> {{ collab.id  }} - </td>
                <td> {{ collab.title  }} - </td>
                <td><Link :href="`users/${collab.slug}/edit`">EDIT</Link> - </td>
                <td><Link :href="`users/${collab.slug}/delete`">DELETE</Link></td>
            </tr>
        </table>
    </AdminPanelLayout>
</template>