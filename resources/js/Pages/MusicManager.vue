<script setup>
    import Dashboard from '@/Pages/Dashboard.vue';
    import Uploads from "@/Plugins/Uploads.vue";
    import BreezeButton from "@/Components/Button.vue";

    let props = defineProps({
        user_uploads: Array,
        uploads: Array,
        data() { 
            return {
                uploadsPreviews: [],
            }  
        }
        
    });

    let selected_files;

    function openUploads() {
    sessionStorage.setItem("UPLOADS", "OPEN");
    }

    function processFiles(files) {

        let uploadsPreview = [];
        document.querySelector('#selectedFiles').innerHTML = "";
        selected_files = files;
        form.uploads = files;
        
        
        props.user_uploads.forEach(upload => {
            selected_files.forEach(file => {
                if(file == upload.id) {
                    uploadsPreview.push(upload);
                }  
            });
        });

        uploadsPreview.forEach(upload => {
            document.querySelector('#selectedFiles').innerHTML += `
            <div class="flex mt-2">
                <div class="relative">
                    <img  class="cursor-pointer w-40 h-40 z-0" src="/assets/img/play_audio.png"/>
                </div>
                <div class="bg-gray-100 rounded-b p-1 w-full truncate">
                    <input type="text" class="border-0 rounded-full" placeholder="Track Title" />
                </div>
            </div>
            `;
        });
    }
</script>

<template>
    <Dashboard>

        <div>
            <div class="flex items-center justify-center flex-col">
                <span class="mt-4">Select the music you want to upload</span>
            </div>
            <div class="min-h-full relative">
                <button class="bg-black  text-white rounded-full p-4 mt-2 mb-2" v-if="!showing" type="button" @click="showing = true; openUploads()">Click Here to open the uploader</button>       
                <Uploads class="min-h-full absolute w-full left-0 top-0 z-10" v-if="showing"  @close="showing = false" @add_files="processFiles" :user_uploads="user_uploads" />
                <div id="selectedFiles"></div>
            </div>
        </div>

    </Dashboard>
</template>

<script>
    export default {
            data (){
                return {
                    showing: false
                }
            },
            mounted() {
                if(sessionStorage.getItem('UPLOADS') == 'OPEN') {
                    this.showing = true;
                } 
            },
        }
    </script>