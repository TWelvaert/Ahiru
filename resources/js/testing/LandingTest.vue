<script setup>
import Layout from '@/Layouts/Layout.vue';
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
                    <a href=""
                        class="bg-green-300 z-30 hover:bg-white text-black py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                        START BUILDING
                        <Link :href="route('register')">REGISTER</Link>
                    </a>
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

        <div id="community-page" class="bg-black min-h-screen grid">

            <h1 class="text-white text-6xl justify-center text-center font-monument antialiased">
                FREELANCE <br> AS AN ARTIST</h1>

            <div class="flex justify-around space-x-4 m-5">
                <div
                    class="bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 black border-solid rounded-tl-lg text-center rounded-full ">

                    <p class="text-white font-monument antialiased m-16">
                        Freelance as an artist </p>
                    <p class="font-roboto text-white">
                        Integrate once and never worry about scaling again. Solana ensures composability between
                        ecosystem projects by maintaining a single global state as the network scales. Never deal with
                        fragmented Layer 2 systems or sharded chains.</p>
                </div>

                <div
                    class="bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 black border-solid rounded-tr-lg text-center rounded-full">
                    <p class="text-white font-monument antialiased m-16">
                        Music Feedback & Follow system</p>
                    <p class="font-roboto text-white">
                        Integrate once and never worry about scaling again. Solana ensures composability between
                        ecosystem projects by maintaining a single global state as the network scales. Never deal with
                        fragmented Layer 2 systems or sharded chains.</p>
                </div>
                <div
                    class="bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 black border-solid rounded-br-lg text-center rounded-full">
                    <p class="text-white font-monument antialiased m-16">The Upload </p>
                    <p class="font-roboto text-white">Integrate once and never worry about scaling again. Solana ensures
                        composability between ecosystem projects by maintaining a single global state as the network
                        scales. Never deal with fragmented Layer 2 systems or sharded chains.</p>
                </div>
                <div
                    class="bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 border-solid  text-center rounded-full">
                    <p class="text-white font-monument antialiased m-16">Integrated music player</p>
                    <p class="font-roboto text-white">Integrate once and never worry about scaling again. Solana ensures
                        composability between ecosystem projects by maintaining a single global state as the network
                        scales. Never deal with fragmented Layer 2 systems or sharded chains.</p>
                </div>
            </div>
            <div class="flex m-4 items-center justify-center">
                <a href="#upload-page" v-smooth-scroll
                    class="hover:bg-white text-white hover:text-white border-2 border-solid border-white py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50">
                    UPLOAD
                </a>

            </div>


            <!-- CARDS ================================================ -->

            <div class="flex mb-16 m-7">
            </div>
        </div>


        <!-- UPLOAD ================================================ -->


        <div class="bg-purple-400 bg-gradient-to-b from-cyan-700 to-blue-300 min-h-screen text-center pt-8"
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

                        <div class="">

                            <p class="text-white font-monument antialiased text-3xl m-16">
                                Freelance as an artist</p>
                            <p class="font-roboto text-white text-2xl font-bold">
                                Book the artist via Ahiru & Get hired to work as freelance on projects or find other
                                artists to
                                collaborate.
                            </p>
                        </div>

                        <div class="">
                            <p class="text-white font-monument antialiased text-3xl m-16">
                                Music Feedback & Follow system</p>
                            <p class="font-roboto text-white text-2xl font-bold">
                                Commenting on the music you like and follow your artist.
                            </p>
                        </div>
                        <div class="text-center">
                            <p class="text-white font-monument antialiased text-3xl m-16">Integrated music player</p>
                            <p class="font-roboto text-white text-2xl font-bold">
                                Listen to music while browsing through our hub for creativity.
                            </p>
                        </div>

                    </div>
                </article>
            </section>

            <div id="community-page" class="bg-black min-h-screen">
            <div class="grid grid-cols-2 gap-1">
                <div class="">
                    <p class="text-white font-monument antialiased text-6xl m-16  ">
                        FREELANCE AS AN ARTIST</p>
                    <p class="font-roboto text-white text-2xl m-16 font-bold">
                        Book the artist via Ahiru & Get hired to work as freelance on projects or find other artists to
                        collaborate.
                    </p>
                </div>
                <div class="card w-96 mx-auto bg-white rounded-lg mt-24 col-start-3 col-end-3  shadow-xl hover:shadow ">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/??ta??ko??/ TY-koh)
                        </p>
                    </div>
                    <hr class="mt-8">
                    <div class="flex p-4">
                        <div class="w-1/2 text-center">
                            <span class="font-bold">1.8 k</span> Followers
                        </div>
                        <div class="w-0 border border-gray-300">
                        </div>
                        <div class="w-1/2 text-center">
                            <span class="font-bold">2.0 k</span> Following
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex m-4 items-center justify-center">
                <a href="#upload-page" v-smooth-scroll
                    class="hover:bg-white text-white hover:text-white border-2 border-solid border-white py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50">
                    UPLOAD
                </a>

            </div>


            <!-- CARDS ================================================ -->

            <div class="flex mb-16 m-7">
            </div>
        </div>
        </div>


    </Layout>
</template>

<script>
import { Application } from '@splinetool/runtime';
import { Link, Head } from '@inertiajs/inertia-vue3';
export default {
    mounted() {
        // make sure you have a canvas in the body
        const canvas = document.querySelector('#canvas3d');

        console.log(canvas)
        // start the application and load the scene
        const spline = new Application(canvas);
        spline.load('https://prod.spline.design/pHiNKU0XXk4eXYUX/scene.splinecode');
    }
}

</script>


