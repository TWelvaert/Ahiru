<script setup>
    import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";  
    
    let data = defineProps({
        users: Array,
    });

    console.log(data["users"])

</script>
    
<template>
    <AdminPanelLayout>
        User List
        <table v-for="user in users.data">
            <tr><td> {{ user.id  }} - </td><td> {{ user.name  }} - </td><td> {{ user.email  }} - </td><td> <a :href="`users/${user.slug}/edit`">EDIT</a> - </td><td> DELETE</td></tr>
        </table>
    </AdminPanelLayout>
</template>