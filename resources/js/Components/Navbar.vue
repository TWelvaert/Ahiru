<template>
    <div class="sticky top-0 z-50">
        <div class="bg-black p-5">
            <nav class="justify-around md:flex md:justify-around     md:items-center">
                <img src="../../assets/images/sphere.gif" class="h-20 absolute left-20" alt="">
                <div class="flex items-center z-30 justify-between font-bold text-white md:text-4xl hover:text-gray-400 font-monument antialiased cursor-pointer
            ">AHIRU
                </div>
                <input class="border-whitefocus:border-white focus:ring-0 rounded-full bg-black text-white pr-32
                    " type="text" id="search" placeholder="SEARCH FOR ARTISTS" />

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <ul :class="showMenu ? 'flex' : 'hidden'" class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-end md:space-x-4 md:mt-0">
                    <div class="space-x-4">

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

                        <BreezeButton
                            class="
                        hover:bg-white
                        text-white
                        hover:text-black
                        border-white
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
                            <Link :href="route('login')">LOG IN</Link>
                        </BreezeButton>
                    </div>

                </ul>
            </nav>
        </div>
    </div>
</template>
<script>
import { Link, Head } from '@inertiajs/inertia-vue3';

export default {
    components: { Link, Head, route },

    data() {
        return {
            showMenu: false,
        };
    },
};
</script>



