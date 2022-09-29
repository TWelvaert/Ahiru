<script setup>
    import { ref } from 'vue';
    import Notification from '@/Components/Notification.vue';
    import MusicPlayer from '@/Plugins/MusicPlayer.vue';
    const showingNavigationDropdown = ref(false);
</script>

<template>

    <!-- Notification Flash Message -->
    <div v-if="$page.props.flash.message" class="absolute top-8 right-10 z-10">
        <Notification :message="$page.props.flash.message" :flashtype="$page.props.flash.flashtype" />
    </div>

    <main>
        <slot />
    </main>
  
    <MusicPlayer class="bg-white absolute bottom-0 overflow-clip" />

</template>


