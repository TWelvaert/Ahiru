<script setup>
    import { computed } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps(['href', 'active']);

    const classes = computed(() => props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-4 border-green-300 font-monument text-sm font-medium leading-5 text-white transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased '
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-monument text-sm font-medium leading-5 text-white transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased'
    );
    </script>

    <template>
        <Link :href="href" :class="classes">
            <slot />
        </Link>
    </template>
