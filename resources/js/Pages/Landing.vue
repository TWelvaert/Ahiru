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
                <p class="text-white text-6xl font-monument antialiased z-30"> <p class="text-green-300">POWERFUL</p> FOR <br>
                    CREATIVES.
                </p>

                <p class="text-white text-6xl font-monument antialiased col-span-2 z-30">ACCESSIBLE <br> FOR <br>
                    EVERYONE.
                </p>

                <!-- Buttons -->

                <div class="ml-8 mt-4 space-x-4 z-40">
                    <a href=""
                        class="bg-green-300 z-30 hover:bg-white text-black py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                        START BUILDING
                    </a>
                    <a href="#community-page" v-smooth-scroll
                        class="hover:bg-white text-white z-30 hover:text-black border-2 border-solid border-white py-3 px-5 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                        WHY AHIRU?
                    </a>
                </div>
                <p class="text-white font-roboto col-span-2 z-40 text-2xl font-bold mt-5">Ahiru is a start up focussing on <br> simplification, providing centralized <br> tools for music creators. </p>
            </div>
        </div>




        <!-- FREELANCE PAGE ================================================= -->

        <div id="community-page" class="bg-black min-h-screen grid">
            <h1 class="text-white text-5xl font-monument antialiased">FREELANCE AS AN ARTIST</h1>


                    <h2 class="text-white text-4xl font-monument antialiased">Join the fastest growing ecosystem </h2>


                    <p class="text-white font-light z-50 relative antialiased">Our community brings artists together to
                        bring forward
                        their creations and benefit from their talent. Our community brings artists together to bring
                        forward their creations and benefit from there talent.</p>
                    <div class="flex m-4 items-center justify-center">
                        <a href="#upload-page" v-smooth-scroll
                            class="hover:bg-white text-white hover:text-white border-2 border-solid border-white py-5 px-6 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50">
                            UPLOAD
                        </a>

                </div>


            <!-- CARDS ================================================ -->

            <div class="flex mb-16 m-7">
                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
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

                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
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

                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
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

                <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                    <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
                        src="../../assets/images/070c4ae0e59af72c222e2756c87baa1a.gif" alt="">
                    <div class="text-center mt-2 text-3xl font-medium">Tycho</div>
                    <div class="text-center mt-2 font-light text-sm">@tycho</div>
                    <div class="text-center font-normal text-lg">Kerala</div>
                    <div class="px-6 text-center mt-2 font-light text-sm">
                        <p>
                            Scott Hansen (born February 7, 1977), known professionally as Tycho (/ˈtaɪkoʊ/ TY-koh)
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
        </div>


        <!-- UPLOAD ================================================ -->


        <div class=" bg-black min-h-screen text-center pt-8" id="upload-page">
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
            <div class="absolute z-10">
                <img src="../../assets/images/waves.gif " class="pl-80" alt="">
            </div>
            <div class="ml-92 mt-16">
                <a href=""
                    class="bg-green-300 hover:bg-white text-black py-5 px-6 rounded-full font-light tracking-widest  transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                    UPLOAD
                </a>
            </div>
        </div>



        <!-- CONTACT ================================================= -->



        <div class=" bg-white min-h-screen">

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
                            class="bg-green-300 hover:bg-white text-black py-5 px-5 rounded-full font-light tracking-widest font transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
                            CREATE ACCOUNT
                        </a>
                    </div>
                    <div class="mt-6 flex items-center justify-center space-x-4 ">

                        <span class="text-center text-xs antialiased">already have an acount?</span>
                        <a href="#community-page" v-smooth-scroll
                            class="hover:bg-white text-white hover:text-black border-2 border-solid border-white py-5 px-5 rounded-full tont-light tracking-widest transition ease-in-out delay-50 hover:-translate-y-0.5 hover:scale-60 duration-50 antialiased">
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
        spline.load('https://prod.spline.design/pHiNKU0XXk4eXYUX/scene.splinecode');
    }
}
</script>


