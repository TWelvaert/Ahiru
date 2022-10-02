<script setup>
import Layout from '@/Layouts/Layout.vue';
import BreezeButton from '@/Components/Button.vue';
import { Link, Head } from '@inertiajs/inertia-vue3';
</script>

    <!-- Template -->

<template>
    <Layout>

        <canvas class="absolute z-10 right-0" id="canvas3d" width="1000" height="1000"></canvas>

        <!-- First page -->

        <div class="relative bg-black min-h-screen">

            <!-- Header text -->

            <div class="grid grid-rows-2 gap-10 grid-cols-2 p-24 pl-72 ">
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">POWERFUL</p> FOR <br>
                CREATIVES.
                </p>

                <p class="text-white text-6xl font-monument antialiased col-span-2 z-30">ACCESSIBLE <br> FOR <br>
                    EVERYONE.
                </p>

                <!-- Buttons -->

                <div class="mt-4 space-x-4 z-40 ">
                    <BreezeButton class="
                        bg-green-300
                        hover:bg-white
                        hover:text-black
                        text-black
                        py-3
                        px-8
                        rounded-full
                        font-light
                        tracking-widest
                        transition ease-in-out delay-50
                        hover:-translate-y-0.5 hover:scale-60 duration-50
                        antialiased
                        text-center
                        ">
                            <Link :href="route('register')">START BUILDING</Link>
                        </BreezeButton>
                    <a href="#community-page" v-smooth-scroll
                        class="hover:bg-white text-white z-30 hover:text-black border-2 border-solid border-white py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                        WHY AHIRU?
                    </a>
                </div>
                <p class="text-white font-roboto col-span-2 z-40 text-2xl font-bold mt-5">Ahiru is a start up focussing
                    on <br> simplification, providing centralized <br> tools for music creators. </p>
            </div>
        </div>




        <!-- FREELANCE PAGE ================================================= -->

        <div id="community-page" class="relative  bg-black min-h-screen">

            <!-- Header text -->

            <div class="grid grid-rows-2 gap-1 grid-cols-2 p-24 pl-72 ">
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">FREELANCE</p> AS AN <br>
                ARTIST.
                <p class="text-white font-roboto z-40 text-2xl font-bold mt-5">Book the artists via Ahiru &
                    <br> get hired to work as freelance on projects <br> or find other artists to collaborate.
                </p>
                </p>
                <a href="#"
                    class="p-6 mr-48 max-w-sm col-end-5 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="../../assets/images/54520cca8c5613dd95fef5fd6a608def.gif" alt="">
                    <h5 class="mb-2 font-monument mt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Looking for Vocals</h5>
                    <p class="font-roboto text-gray-700 dark:text-gray-400 line-clamp-3"> Hi! I'm a producer looking for
                        vocals for my project.
                    </p>
                </a>
            </div>
        </div>


        <!-- UPLOAD ================================================ -->

        <div id="community-page" class="relative  bg-black min-h-screen">

            <!-- Header text -->

            <div class="grid grid-rows-2 gap-1 grid-cols-2 p-24 pl-72 ">
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">THE</p> UPLOAD

                <p class="text-white font-roboto z-40 text-2xl font-bold mt-5">Upload your sounds to the platform
                    <br> Get heard from people across the globe,<br> And grow our ad free community!
                </p>
                </p>
                <div class="bg-gray-900 w-96 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72 block rounded"
                            src="https://upload.wikimedia.org/wikipedia/en/f/f1/Tycho_-_Epoch.jpg" alt="" />
                        <div
                            class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-72 h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>

                            <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">Epoch</h3>
                        <p class="text-gray-400">Tycho</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="community-page" class="relative  bg-black min-h-screen">

            <!-- Header text -->

            <div class="grid grid-rows-2 gap-1 grid-cols-2 p-24 pl-72 ">
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">BUILT IN</p> CHATBOX <br>

                <p class="text-white font-roboto z-40 text-2xl font-bold mt-5">Get in touch with other creators
                    <br> Talk about future collaborations <br> Grow your network.
                </p>
                </p>
                <section class="w-8/12 px-4 flex min-h-full flex-col bg-white">
                    <div v-if="user2" class="flex justify-between items-center border-b-2">
                        <div class="flex space-x-4 p-1 items-center">
                            <div class="h-12 w-12 rounded-full overflow-hidden">
                                <img id="user2_profile_image" src="https://bit.ly/2KfKgdy" loading="lazy"
                                    class="h-full w-full object-cover" />
                            </div>
                            <div class="flex flex-col">
                                <Link id="user2_profile_link" class="cursor-pointer"
                                    v-bind:href="'/profile/'+user2.slug">
                                <h3 id="user2_name" class="font-semibold text-lg">{{ user2.name }}</h3>
                                </Link>
                            </div>
                        </div>
                        <div>
                            <ul class="flex text-gray-400 space-x-4">
                                <li class="w-6 h-6">
                                    <Link class="cursor-pointer" v-bind:href="'/inbox/message/'+user2.slug+'/delete'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <section id="messageField" style="height:100%"
                        class="mt-2 flex flex-col gap-1 text-gray-600 leading-7 tracking-wider relative">

                        <div v-if="messages" v-for="message in messages">
                            <div v-if="message.user_id == user_auth.id" class="flex justify-end">
                                <p class="bg-green-300 rounded-xl w-fit max-w-3/5 p-1 px-2 right-0">
                                    {{ message.message }}
                                </p>
                            </div>
                            <div v-else="message.to_user == user2.id">
                                <p class="bg-slate-100 rounded-xl w-fit max-w-3/5 p-1 px-2 left-0">
                                    {{ message.message }}
                                </p>
                            </div>
                        </div>
                        <div v-else="!messages">
                            <p v-if="user2" class="text-gray-400 mt-2 text-sm text-center">
                                There are no messages in this conversation<br>
                                Write and send a new message to start a new conversation.
                            </p>
                            <p v-else="!user2" class="text-gray-400 mt-2 text-sm text-center">
                                Welcome to your inbox !
                            </p>
                        </div>


                    </section>

                    <section class="mt-6 rounded bg-black mb-3 p-1">
                        <textarea id="textArea" class="w-full border-0 bg-gray-50 p-2 rounded"
                            placeholder="Write your message here..." rows="3"></textarea>
                        <div class="flex items-center justify-end p-2">
                            <button id="sendButton" class="bg-green-300 text-gray-600 px-6 py-2 rounded">
                                Send
                            </button>
                        </div>
                    </section>
                </section>
            </div>
        </div>


        <div id="community-page" class="relative  bg-black min-h-screen">

            <!-- Header text -->

            <div class="grid grid-rows-2 gap-1 grid-cols-2 p-24 pl-72 ">
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">ARTIST</p>PROFILE<br>DASHBOARD

                <p class="text-white font-roboto z-40 text-2xl font-bold mt-5">Book the artists via Ahiru &
                    <br> get hired to work as freelance on projects <br> or find other artists to collaborate.
                </p>
                </p>
                <div class="flex items-center justify-center">
                <img id="settings_profilePicture" class="h-48 w-48 mt-8 m-5 border-white border-2 rounded-full bg-opacity-80 backdrop-blur-lg drop-shadow-lg" src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
            </div>
            </div>
        </div>


        <!-- CONTACT ================================================= -->



        <div class=" bg-white min-h-screen">
            <div class='bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 height-'>
                <p></p>
            </div>
            <article class="text-center pt-24">
                <h1 class="text-4xl font-monument antialiased">Thanks for listening. <br> Now join in.</h1> <br> <br>
                <h2 class="text-2xl font-monument antialiased">Save tracks, follow artists and build playlists.<br> All
                    for
                    free.</h2>
            </article>

            <section class="grid place-items-center pt-24">
                <article
                    class="text-center p-10 min-h-116 max-w-3xl w-full bg-black rounded-xl text-gray-100 xl:col-span-2 transform duration-500 hover:-translate-y-1">
                    <h1 class=" mt-5 text-5xl font-light text-gray-100 leading-snug  min-h-33 antialiased">One small
                        step
                        for you one
                        giant leap for your career
                    </h1>
                    <div class="mt-20">

                    </div>

                    <BreezeButton class="
                        bg-green-300
                        hover:bg-white
                        text-black
                        py-2
                        px-8
                        rounded-full
                        font-light
                        tracking-widest
                        transition ease-in-out delay-50
                        hover:-translate-y-0.5 hover:scale-60 duration-50
                        antialiased
                        text-center
                        ">
                            <Link :href="route('register')">REGISTER</Link>
                        </BreezeButton>
                    <div class="mt-6 flex items-center justify-center space-x-4 ">

                        <span class="text-center text-xs antialiased">already have an acount?</span>
                        <BreezeButton
                            class="
                        hover:bg-white
                        text-white
                        hover:text-black
                        border-white
                        bg-black
                        border-2
                        border-solid
                        py-2
                        px-8
                        rounded-full
                        font-light
                        tracking-widest
                        transition ease-in-out delay-50
                        hover:-translate-y-0.5
                        hover:scale-60 duration-50
                        antialiased

                        ">
                            <Link :href="route('login')">SIGN IN</Link>
                        </BreezeButton>

                    </div>
                </article>
            </section>
        </div>


    </Layout>
</template>

<script>
import { Application } from '@splinetool/runtime';


export default {


    mounted() {

        // make sure you have a canvas in the body
        const canvas = document.querySelector('#canvas3d');

        console.log(canvas)
        // start the application and load the scene
        const spline = new Application(canvas);
        spline.load('https://prod.spline.design/pHiNKU0XXk4eXYUX/scene.splinecode')
        spline.load('https://prod.spline.design/pHiNKU0XXk4eXYUX/scene.splinecode');
    }
}



</script>

