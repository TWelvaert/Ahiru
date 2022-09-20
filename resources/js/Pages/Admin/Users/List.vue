<script setup>
    import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";  
    import { Link } from '@inertiajs/inertia-vue3';

    let data = defineProps({
        users: Array,
    });

    console.log(data["users"])

</script>
    
<template>
    <AdminPanelLayout>
        User List
        <table v-for="user in users.data">
            <tr>
                <td> {{ user.id  }} - </td>
                <td> {{ user.name  }} - </td>
                <td> {{ user.email  }} - </td>
                <td><Link :href="`users/${user.slug}/edit`">EDIT</Link> - </td>
                <td><Link :href="`users/${user.slug}/delete`">DELETE</Link></td></tr>
        </table>
    </AdminPanelLayout>
</template>