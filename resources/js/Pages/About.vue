<script setup>
    
import Layout from '@/Layouts/Layout.vue';
import MusicPlayer from '@/Components/MusicPlayer.vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
</script>

<template>
    <HomeLayout>
        <div>
            <MusicPlayer />
        </div>
    </HomeLayout>
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