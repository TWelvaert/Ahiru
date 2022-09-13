<script setup>
    import { computed } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps(['href', 'active']);

    const classes = computed(() => props.active
        ? 'inline-flex items-center px-1 pt-1 font-monument transition duration-150 border-b-8 border-transparent hover:border-green-300 text-white transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased'
        : 'active:bg-green-300 inline-flex items-center px-1 pt-1 font-monument transition hover:border-green-300 duration-150 border-b-8 border-transparent  text-white transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased'
    );
    </script>

    <template>
        <Link :href="href" :class="classes">
            <slot />
        </Link>
    </template>
