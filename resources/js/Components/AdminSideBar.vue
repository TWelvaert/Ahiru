<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div style="border-right: solid 1px black">
        <h2><b><u>ADMIN PANEL</u></b></h2><br>
        <Link :href="route('admin')">Dashboard</Link><br><br>
        <Link :href="route('admin')">Collaborations</Link><br><br>
        <b>News</b><br>
        <Link :href="route('admin/news')">Articles</Link><br>
        <Link :href="route('admin/news/create')">Create</Link><br><br>
        <b>Users</b><br>
        <Link :href="route('admin/users')">List</Link>
        <br><br>
        <b>Uploadsmanager</b><br>
        <a href="/admin" class="text-orange-600">Uploads</a><br>
    </div>
</template> 