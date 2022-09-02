

<template>
    <!-- First -->
    <div class="main-container bg-black min-h-screen">
        <div class="landing-container position-absolute">
            <div class="h1-landing">
                <div class="h1-section">
                    <h1 class="text-white text-9xl font-monument">AHIRU</h1>
                </div>
            </div>

            <div class="p-landing-1 w-96 flex ">
                <p id="p-l1" class="text-white text-6xl m-24 pl-60 font-monument">POWERFUL FOR CREATIVES.</p>
            </div>
            <div class="p-landing-2 w-96 ">
                <p id="p-l2" class="text-white text-6xl m-36 pl-80  font-monument">ACCESSIBLE FOR EVERYONE.</p>
            </div>
        </div>

        <div class="btn-landing-container flex items-center justify-center space-x-4">
                <button @click="goto('div2')" class="bg-green-300 hover:bg-white text-black py-5 px-8 rounded-full font-monument tracking-widest font font-thin">
                    START BUILDING
                </button>
                <button
                    class="hover:bg-white text-white hover:text-black border-2 border-solid border-white py-5 px-8 rounded-full font-monument tracking-widest font-thin">
                    WHY AHIRU?
                </button>
        </div>
    </div>
        <!-- Second -->
    <div ref="div2" class="main-container bg-white min-h-screen">
        <div class="landing-container position-absolute">
            <div class="h1-landing">
                <div class="h1-section">
                    <h1 class="text-black text-9xl font-monument">OUR COMMUNITY</h1>
                </div>
            </div>

            <div class="p-community-1 w-96 flex ">
                <p id="p-c1" class="text-black text-6xl m-24 pl-60 font-monument">JOIN OUR COMMUNITY</p>
                <p class=" flex-auto w-64 text-center font-monument"> Our community brings artists together to bring forward their creations and benefit from there talent. Our community brings artists together to bring forward their creations and benefit from there talent.</p>
            </div>
            <div class="p-community-2 w-96 ">
                <p id="p-c2" class="text-black text-6xl m-36 pl-80  font-monument">ACCESSIBLE FOR EVERYONE.</p>
            </div>
        </div>
    </div>
        <!-- Third -->
    <div class="main-container bg-black min-h-screen">
        <div class="landing-container position-absolute">
            <div class="h1-landing">
                <div class="h1-section">
                    <h1 class="text-white text-9xl font-monument">AHIRU</h1>
                </div>
            </div>

            <div class="p-landing-1 w-96 flex ">
                <p id="p-l1" class="text-white text-6xl m-24 pl-60 font-monument">POWERFUL FOR CREATIVES.</p>
            </div>
            <div class="p-landing-2 w-96 ">
                <p id="p-l2" class="text-white text-6xl m-36 pl-80  font-monument">ACCESSIBLE FOR EVERYONE.</p>
            </div>
        </div>
    </div>
        <!-- Fourth -->
        <div class="main-container bg-white min-h-screen">
        <div class="landing-container position-absolute">
            <div class="h1-landing">
                <div class="h1-section">
                    <h1 class="text-black text-9xl font-monument">AHIRU</h1>
                </div>
            </div>

            <div class="p-landing-1 w-96 flex ">
                <p id="p-l1" class="text-black text-6xl m-24 pl-60 font-monument">POWERFUL FOR CREATIVES.</p>
            </div>
            <div class="p-landing-2 w-96 ">
                <p id="p-l2" class="text-black text-6xl m-36 pl-80  font-monument">ACCESSIBLE FOR EVERYONE.</p>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
      methods: {
        goto(refName) {
          var element = this.$refs[refName];
          var top = element.offsetTop;

          window.scrollTo(0, top);
        }
      }
    };
    </script>
