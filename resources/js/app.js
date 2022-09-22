import './bootstrap';
import '../css/app.css';
import 'flowbite';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueSmoothScroll from 'vue3-smooth-scroll'
import { TroisJSVuePlugin } from 'troisjs';
import MusicPLayer from './Plugins/MusicPlayer.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(MusicPLayer, {
                MusicPLayer: 'MusicPLayer' 
            })
            .use(ZiggyVue, Ziggy)
            .use (VueSmoothScroll, {
                duration: 50,
                updateHistory: false
              } )
              .use (TroisJSVuePlugin)
            .mount(el);
    },
});

InertiaProgress.init({ color: 'red', showSpinner: true });