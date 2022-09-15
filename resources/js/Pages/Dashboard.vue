<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Header from "@/Components/Header.vue";
import { Head } from "@inertiajs/inertia-vue3";



let data = defineProps({
    user: Array
});

</script>

<!-- Template -->

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <!-- Header -->

        <Header :user="user" />

        <!-- Glass container  -->

        <div class="py-24 bg-white w-full sm:rounded-lg bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg flex flex-row items-center justify-center">

            <slot />

        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
var i = 0;
var txt = 'Hey Creator how is your day?'; /* The text */
var speed = 150; /* The speed/duration of the effect in milliseconds */

export default {
    name: "App",
    mounted() {
        typeWriter();
        function typeWriter()
        {
            if (i < txt.length) {
                if (document.getElementById("welcome")){
                    document.getElementById("welcome").innerHTML += txt.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
        }
    }
}
</script>
