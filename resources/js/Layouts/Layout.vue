<template>
    <Navbar />
        <section>
            <slot />
        </section>
    <Footer />
    <MusicPlayer />
</template>

<script>
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
import MusicPlayer from '@/Components/MusicPlayer.vue';

export default {
    components : { Navbar, Footer, MusicPlayer }
}
</script>