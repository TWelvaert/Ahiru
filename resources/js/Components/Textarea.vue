<script setup>
import { onMounted, ref } from "vue";

defineProps(["modelValue"]);

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("focus")) {
        input.value.focus();
    }
});

</script>

<template>
    <textarea
        class="w-xl"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
