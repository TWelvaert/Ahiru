<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Header from "@/Components/Header.vue";
import { Head } from "@inertiajs/inertia-vue3";
// import { Welcome } from "@/Layouts/Welcome.js";

let data = defineProps({
    user: Array
});

//console.log (data["user"]);

</script>



<!-- Template -->

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

        <!-- Header -->
        <Header :user="user" />


            <div class="font-monument">
            <span id="welcome" class="flex items-center justify-center">
            </span>
        </div>
        <span class="flex items-center justify-center">
            You have 14788 plays last 7 days
            </span>


        <!-- Glass container  -->

        <div class="bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg flex flex-row items-center justify-center">

            <section class="container mx-auto p-10 md:py-20 px-5 md:p-10">
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10">
            <article class="mx-auto group w-full shadow-2xl max-w-md pb-8 rounded-b-2xl transform duration-500 hover:-translate-y-2 cursor-pointer">
                <section class="content bg-cover bg-center h-64 rounded-2xl" style="background-image: url(https://imgproxy.ra.co/_/quality:100/w:1500/rt:fill/plain/https://static.ra.co/images/podcast/ra822-gigi-fm-cvr.jpg) ;">
                    <div class="flex items-end w-full h-full bg-black bg-opacity-20 text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
                            <span>4116</span>
                        </div>
                        <div class="w-1/2 flex items-center flex-row-reverse">
                            <svg class="w-6 h-6 ml-2 place-items-end group-hover:animate-ping absolute " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <svg class="w-6 h-6 ml-2 place-items-end relative" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <span class="place-items-end">16</span>
                        </div>
                    </div>
                </section>
                <div class="my-5 p-4 flex">
                    <img class="w-10 h-10 rounded-full " src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt="">
                    <div class="w-full flex justify-end space-x-1">
                        <!-- <img class="w-10 h-10 rounded-full" src="../../assets/images/e51a2d30627a6e004f91453c1e7877c0.gif" alt="">
                        <img class="w-10 h-10 rounded-full" src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt="">
                        <img class="w-10 h-10 rounded-full" src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt=""> -->
                    </div>
                </div>
                <div class="mt-14 px-4">
                    <h2 class="mt-4 text-base font-medium text-gray-400">Seljalandsfoss Waterfall, Iceland</h2>
                    <p class="mt-2 text-2xl text-gray-700">This photo was taken by <a class="cursor-pointer hover:underline" target="_blank" href="https://unsplash.com/photos/zNN6ubHmruI">Robert Lukeman</a> </p>
                </div>
            </article>
            <article class="mx-auto group w-full shadow-2xl max-w-md pb-8 rounded-b-2xl transform duration-500 hover:-translate-y-2 cursor-pointer group">
                <section class="content bg-cover bg-center h-64 rounded-2xl" style="background-image: url(https://imgproxy.ra.co/_/quality:100/w:1500/rt:fill/plain/https://static.ra.co/images/podcast/ra849-yousuke-yuk1matsu-cvr.jpg)">
                    <div class="flex items-end w-full h-full bg-black bg-opacity-20 text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                            <svg class="w-6 h-6 mr-2 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
                            <span>11219</span>
                        </div>
                        <div class="w-1/2 flex items-center flex-row-reverse">
                            <svg class="w-6 h-6 ml-2 place-items-end group-hover:animate-ping absolute " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <svg class="w-6 h-6 ml-2 place-items-end relative" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <span class="place-items-end">98</span>
                        </div>
                    </div>
                </section>
                <div class="my-5 p-4 flex">
                    <img class="w-10 h-10 rounded-full " src="../../assets/images/e51a2d30627a6e004f91453c1e7877c0.gif" alt="">
                    <div class="w-full flex justify-end space-x-1">
                        <!-- <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt=""> -->
                    </div>
                </div>
                <div class="mt-14 px-4">
          <h2 class="mt-4 text-base font-medium text-gray-400">Cappadocia, Turkey</h2>
                    <p class="mt-2 text-2xl text-gray-700">This photo was taken by <a class="cursor-pointer hover:underline" target="_blank" href="https://unsplash.com/photos/t7YycgAoVSw">Daniela Cuevas</a></p>
                </div>
            </article>

            <article class="mx-auto group w-full shadow-2xl max-w-md pb-8 rounded-b-2xl transform duration-500 hover:-translate-y-2 cursor-pointer">
                <section class="content bg-cover bg-center h-64 rounded-2xl" style="background-image: url(https://imgproxy.ra.co/_/quality:100/w:1500/rt:fill/plain/https://static.ra.co/images/podcast/ra843-nosedrip-cvr.jpg) ">
                    <div class="flex items-end w-full h-full bg-black bg-opacity-20 text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
                            <span>27615</span>
                        </div>
                        <div class="w-1/2 flex items-center flex-row-reverse">
                            <svg class="w-6 h-6 ml-2 place-items-end group-hover:animate-ping absolute " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <svg class="w-6 h-6 ml-2 place-items-end relative" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <span class="place-items-end">217</span>
                        </div>
                    </div>
                </section>
                <div class="my-5 p-4 flex">
                    <img class="w-10 h-10 rounded-full " src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt="">
                    <div class="w-full flex justify-end space-x-1">
                        <!-- <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt=""> -->
                    </div>
                </div>
                <div class="mt-14 px-4">
                    <h2 class="mt-4 text-base font-medium text-gray-400">Skye, United Kingdom</h2>
                    <p class="mt-2 text-2xl text-gray-700">This photo was taken by <a class="cursor-pointer hover:underline" target="_blank" href="https://unsplash.com/photos/_RBcxo9AU-U">Robert Lukeman</a></p>
                </div>
            </article>
            <article class="mx-auto group w-full shadow-2xl max-w-md pb-8 rounded-b-2xl transform duration-500 hover:-translate-y-2 cursor-pointer">
                <section class="content bg-cover bg-center h-64 rounded-2xl" style="background-image: url(https://imgproxy.ra.co/_/quality:100/w:1500/rt:fill/plain/https://static.ra.co/images/podcast/ra831-madam-x-cvr.jpg) ;">
                    <div class="flex items-end w-full h-full bg-black bg-opacity-20 text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
                            <span>15982</span>
                        </div>
                        <div class="w-1/2 flex items-center flex-row-reverse">
                            <svg class="w-6 h-6 ml-2 place-items-end group-hover:animate-ping absolute " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <svg class="w-6 h-6 ml-2 place-items-end relative" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
                            <span class="place-items-end">106</span>
                        </div>
                    </div>
                </section>
                <div class="my-5 p-4 flex">
                    <img class="w-10 h-10 rounded-full " src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt="">
                    <div class="w-full flex justify-end space-x-1">
                        <!-- <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt="">
                        <img class="w-10 h-10 rounded-md" src="" alt=""> -->
                    </div>
                </div>
                <div class="mt-14 px-4">
                    <h2 class="mt-4 text-base font-medium text-gray-400">Lake Atitlán, Guatemala</h2>
                    <p class="mt-2 text-2xl text-gray-700">This photo was taken by <a class="cursor-pointer hover:underline" target="_blank" href="https://unsplash.com/photos/K2s_YE031CA">Mark Hurpur</a></p>
                </div>
            </article>
        </section>
    </section>
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
