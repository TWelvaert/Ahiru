<template>
    <BreezeAuthenticatedLayout />
        <section>
            <slot />
        </section>
    <Footer />
    <MusicPlayer />
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Footer from '@/Components/Footer.vue';
import MusicPlayer from '@/Components/MusicPlayer.vue';



export default {
    components : { BreezeAuthenticatedLayout, Footer, MusicPlayer }
}
</script>