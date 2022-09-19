<template>
    <div class="vue-modal">
        <transition name="slide">
            <div class="vue-modal-inner">
                <div class="vue-modal-content">
                    <slot />
                    <button type="button" class="text-red-600" @click="$emit('close')">Close</button>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            open: {
                type: Boolean,
                default: false,
            },
        },
    };
</script>