<script setup>
    
import Layout from '@/Layouts/Layout.vue';
import MusicPlayer from '@/Components/MusicPlayer.vue';
</script>

<template>
    <Layout>
        <div>
            <MusicPlayer />
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
    color: red;
}
</style>

<script>
    export default {
        components: { Layout, MusicPlayer }
    }
</script>