<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center bg-green-300 hover:bg-black hover:text-white text-black py-3 px-8 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
        <slot />
    </button>
</template>
