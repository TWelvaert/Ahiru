<script setup>
    
    import Layout from '@/Layouts/Layout.vue';
</script>

<template>
    <Layout>
        <div>
            <h2>Artists</h2>
        </div>
    </Layout>
</template>  

<style>

h2 {
    width: 500px;
    height: 500px;
    display: flex;
    justify-content: center;
  	align-items: center;
    color: white;
}
</style>

<script>
    export default {
        components: { Layout }
    }
</script>