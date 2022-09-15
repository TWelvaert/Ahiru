<template>
    <div>
        <div class="bg-black">
            <nav class="
            max-w-full
            pl-8
            py-4
            ml-8
            mr-8
            md:flex md:justify-between md:items-center
            shrink-0
        ">
                <div class="flex items-center justify-between
                text-xl
                font-bold
                text-white
                md:text-9xl
                hover:text-gray-400
                font-monument
                antialiased cursor-pointer
            ">AHIRU


                    <div @click="showMenu = !showMenu" class="flex md:hidden">
                        <button type="button" class="
                text-white
                hover:text-gray-400
                focus:outline-none
                focus:text-gray-400
            ">
                        </button>
                    </div>
                </div>
                <div class="
                grid
                place-items-center
                text-white">
                </div>
                <input class="
                    h-full
                    border-white
                    focus:border-white
                    focus:ring-0 rounded-full
                    bg-black text-sm
                    text-white
                    pr-32
                    " type="text" id="search" placeholder="SEARCH FOR ARTISTS" />
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <ul :class="showMenu ? 'flex' : 'hidden'" class="
            flex-col
            mt-8
            space-y-4
            md:flex
            md:space-y-0
            md:flex-row
            md:items-end
            md:space-x-4
            md:mt-0

            ">
                    <!-- <li
                        class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400">
                        <Link href="/">Home</Link>
                    </li> -->
                    <!-- <li
                        class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400">
                        <Link href="/About">About</Link>

                    </li> -->
                    <!-- <li
                        class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400">
                        <Link href="/Artists">Artists</Link>

                    </li> -->
                    <!-- <li
                        class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400">
                        <Link href="/Contact">Contact Us</Link>
                    </li> -->
                    <div class="flex-col
            mt-8
            space-y-4
            md:flex
            md:space-y-0
            md:flex-row
            md:items-end
            md:space-x-4
            md:mt-0 m-7">

                        <li class="
                        bg-green-300
                        hover:bg-white
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
                            <Link :href="route('register')">REGISTER</Link>
                        </li>

                        <li
                            class="
                        hover:bg-white
                        text-white
                        hover:text-black
                        border-white
                        border-2
                        border-solid
                        py-3
                        px-8
                        rounded-full
                        font-light
                        tracking-widest
                        transition ease-in-out delay-50
                        hover:-translate-y-0.5
                        hover:scale-60 duration-50
                        antialiased
                        text-center
                        ">
                            <Link :href="route('login')">LOG IN</Link>
                        </li>
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




