<template>
  <div>
    <div class="bg-black">
      <nav
        class="
          max-w-full
          pl-8
          py-4
          ml-8
          mr-8
          md:flex md:justify-between md:items-center
          shrink-0
        "
      >
        <div class="flex items-center justify-between">
          <router-link
            to="/Landing"
            class="
              text-xl
              font-bold
              text-white
              md:text-2xl
              hover:text-gray-400
            "
            >AHIRU
          </router-link>
          
          <div @click="showMenu = !showMenu" class="flex md:hidden">
            <button
              type="button"
              class="
                text-white
                hover:text-gray-400
                focus:outline-none focus:text-gray-400
              "
            >
              <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                <path
                  fill-rule="evenodd"
                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                ></path>
              </svg>
            </button>
          </div>
        </div>


        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <ul
          :class="showMenu ? 'flex' : 'hidden'"
          class="
            flex-col
            mt-8
            space-y-4
            md:flex
            md:space-y-0
            md:flex-row
            md:items-end
            md:space-x-10
            md:mt-0
            
          "
        >
          <li class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400"><Link href="/" >Home</Link> 
          </li>
          <li class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400"><Link href="/About" >About</Link> 
            
          </li>
          <li class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400"><Link href="/Artists" >Artists</Link> 
           
          </li>
          <li class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400"><Link href="/Contact" >Contact Us</Link> 
          </li>
          
          <li class="text-sm font-bold text-white p-1 rounded-lg px-5 py-1 text-center mr-3 md:mr-0hover:text-gray-400"><Link href="#">Register</Link> 
          </li>
          
          <li class="text-sm font-bold text-black p-1 bg-white rounded-lg  px-5 py-1 text-center mr-3 md:mr-0 hover:text-gray-400 "><Link href="#">Log In</Link> 
          </li>

          
        </ul>
      </nav>
    </div>
  </div>
</template>
<script>
import { Link, Head } from '@inertiajs/inertia-vue3';
export default {
  components: { Link, Head },

  data() {
    return {
      showMenu: false,
    };
  },
};
</script>

  


