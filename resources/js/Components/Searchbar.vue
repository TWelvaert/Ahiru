
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
    <div class="pt-3">
        <input class="border-white opacity-50 focus:border-white focus:ring-0 rounded-full bg-black text-l text-white h-10 pr-32 px-8" 
                type="text" 
                id="search" 
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                 ref="search" />
     </div>
</template>
