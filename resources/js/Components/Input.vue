<script setup>
    import { onMounted, ref } from 'vue';

    defineProps(['modelValue']);

    defineEmits(['update:modelValue']);

    const input = ref(null);

    onMounted(() => {
        if (input.value.hasAttribute('autofocus')) {
            input.value.focus();
        }
    });
    </script>

    <template>
        <input class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-20 rounded-full shadow-lg" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
    </template>

