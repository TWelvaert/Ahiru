<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Header from "@/Components/Header.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>



<!-- Template -->

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <Header />

        <div class=" m-8">
            <span id="welcome" class="font-monument flex items-center justify-center"></span>

        <span class="flex items-center justify-center">
            You have 14788 plays last 7 days
        </span>
        </div>


            <slot />


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
