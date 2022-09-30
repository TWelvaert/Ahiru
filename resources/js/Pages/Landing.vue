<script setup>
import Layout from '@/Layouts/Layout.vue';
</script>

<!-- Template -->

<template>
    <Layout>



        

        <!-- First page -->

        <div class="bg-black min-h-screen">
        <canvas class="absolute z-10 right-0" id="canvas3d" width="1000" height="1000"></canvas>
            <!-- Header text -->

            <div class="grid grid-rows-2 gap-10 grid-cols-2 p-24 pl-72 ">
                
                <p class="text-white text-6xl font-monument antialiased z-30">
                <p class="text-green-300">POWERFUL</p>
                <p>FOR</p>
                <p>CREATIVES</p>
                </p>

                <p class="text-white text-6xl font-monument antialiased col-span-2 z-30">ACCESSIBLE <br> FOR <br>
                    EVERYONE.
                </p>
                
                <!-- Buttons -->

                <div class=" flex flex-wrap w-full gap-x-5 gap-y-3 :color-red">
                    <a href=""
                        class="bg-green-300 z-30 hover:bg-white text-black py-3 px-4 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased ">
                        START BUILDING
                    </a>
                    <a href="#community-page" v-smooth-scroll
                        class="hover:bg-white text-white z-30 hover:text-black border-2 border-solid border-white py-3 px-8 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
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
                    <img src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <h5 class="mb-2 font-monument mt-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Looking for Vocals</h5>
                    <p class="font-roboto text-gray-700 dark:text-gray-400 line-clamp-3"> Hi! I'm a producer looking for
                        vocals for my project.
                    </p>
                </a>
            </div>
        </div>


        <!-- UPLOAD ================================================ -->


        <div class="bg-black min-h-screen text-center pt-8"
            id="upload-page">
            <div class="">
                <h2 class="text-white text-6xl mt-8 pl-50 flex font-monument">UPLOAD YOUR CONTENT AND GROW OUR AD FREE
                    COMMUNITY
                </h2>
                <div class="mt-10">
                    <span class="text-white text-4xl font-monument">
                        Calling all creators
                    </span>
                </div>

                <p class="text-white text-xl font-light mt-11">
                    Get on AHIRU to connect with fans, share your sounds, and grow your audience. <br> What are you
                    waiting
                    for?
                </p>


            </div>
            <div class="ml-92 mt-16">
                <a href=""
                    class="bg-green-300 hover:bg-white text-black py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                    UPLOAD
                </a>
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

                    <div class="flex items-center justify-center space-x-4">
                        <a href=""
                            class="bg-green-300 hover:bg-white text-black py-3 px-5 rounded-full font-light tracking-widest font transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                            CREATE ACCOUNT
                        </a>
                    </div>
                    <div class="mt-6 flex items-center justify-center space-x-4 ">

                        <span class="text-center text-xs antialiased">already have an acount?</span>
                        <a href="#community-page" v-smooth-scroll
                            class="hover:bg-white text-white hover:text-black border-2 border-solid border-white py-3 px-5 rounded-full tont-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                            SIGN IN
                        </a>

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


