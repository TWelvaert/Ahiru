<template>
        <div class="bg-white w-full min-h-full p-2">
            <form id="form" @submit.prevent="submit" enctype="multipart/form-data" novalidate>
                <div class="flex justify-center items-center w-full">
                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <div id="upload_info">
                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Images: SVG, PNG, JPG, GIF</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Audio: MP3, WAV</p>
                            </div>
                            <div id="filesPreview" style="display: none;" class="bg-white roundedabsolute gap-2 m-4 p-2"></div>
                        </div>
                        
                        <BreezeInput id="dropzone-file" @input="form.uploads = $event.target.files; loadFilePreview($event.target.files)" type="file" class="hidden" multiple />
                    </label>
                </div>
                <div class="float-right mt-2">
                    <BreezeButton name="form" class="ml-4" :class="{ 'opacity-25': this.$refs.processing }" :disabled="this.$refs.processing">
                        Upload
                    </BreezeButton>
                </div>
            </form>

            <div class="flex mt-2">
                <form @submit.prevent="">
                    <BreezeInput id="filter" placeholder="Search file name" type="text" />
                    <BreezeButton  @click="resetSelection()" class="ml-4">
                        Reset
                    </BreezeButton>
                    <BreezeButton id="confirmButton" @click.prevent="close" class="ml-4">
                        Confirm
                    </BreezeButton>
                </form>
            </div>

            <div id="all_uploads" class="gap-4 mt-4">
                <div class="flex overflow-scroll p-2">
                    <div v-for="upload in this.user_uploads">
                        <div v-if="upload.type == 'image'">
                            <div @click="e => select(e)" :id="upload.id" class="ml-1" :class="{active: isActive} ">
                                <header class="bg-gray-100 text-black rounded-t p-1 w-40 truncate">
                                    <Link class="cursor-pointer" v-bind:href="`/settings/uploads/delete/${upload.id}`">Delete</Link>  
                                </header>
                                <main class="relative">
                                    <img class="w-40 h-40 z-0 cursor-pointer" :src="`/${upload.path}/${upload.name}`" />
                                </main>
                                <footer class="flex justify-between bg-gray-100 rounded-b p-1 w-40 truncate">
                                    {{ upload.original_name }}
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex overflow-scroll p-2">
                    <div v-for="upload in this.user_uploads" class="mt-4">
                        <div v-if="upload.type == 'audio'" class="w-40 ml-1" @click="e => select(e)" :id="upload.id" :class="{active: isActive}">
                            <header class="bg-gray-100 text-black rounded-t p-1 w-40 truncate text-center flex justify-between">
                                <span id="play" v-on:click="$callMusicPlayer(upload.name)">Play</span> 
                                <Link class="cursor-pointer" v-bind:href="`/settings/uploads/delete/${upload.id}`">Delete</Link> 
                            </header>
                            <main class="relative">
                                <img  class="cursor-pointer w-40 h-40 z-0" src="/assets/img/play_audio.png"/>
                            </main>
                            <footer class="bg-gray-100 rounded-b p-1 w-40 truncate">
                                {{ upload.original_name }}
                            </footer>
                        </div>
                    </div>
                </div>
            </div>

            <div id="filtered_uploads" class="flex gap-4"></div>
        </div>
</template>


<script setup>

import { Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from '@/Components/Label.vue';
import { onMounted, inject  } from 'vue';

const emits = defineEmits(['add_files', 'close'])

const form = useForm({
    uploads: [],
});

let props = defineProps({
    isActive: Boolean,
    user_uploads: Array,
});

function callFilter() {
    let input = document.querySelector('#filter').value;
    if(input.length > 0) {
        let uploads = props.user_uploads;
        
        uploads = uploads.filter(upload => upload.original_name.toLowerCase().includes(input.toLowerCase()));

        document.querySelector('#filtered_uploads').innerHTML = '';
        
        document.querySelector('#all_uploads').style.display = "none";

        for(let i=0; i<uploads.length; i++) {
            let top_content = ``;
            let main_content = ``;

            if(uploads[i].type == 'image') {
                top_content = `<Link class="cursor-pointer" v-bind:href="/settings/uploads/delete/${uploads[i].id}">Delete</Link> `;
                main_content = `<img class="w-40 h-40 z-0 cursor-pointer" src="../${uploads[i].path}/${uploads[i].name}" />`;
            } 
            if(uploads[i].type == 'audio') {
                top_content = `<Link class="cursor-pointer" v-bind:href="/settings/uploads/delete/${uploads[i].id}">Delete</Link><span id="play">Play</span>`;
                main_content = `<img class="cursor-pointer w-40 h-40 z-0" id="play" alt="${uploads[i].name}" src="/assets/img/play_audio.png" />`;
            } 
        
            let output = `
                <div>
                    <header class="bg-gray-100 text-black rounded-t p-1 w-40 truncate">
                        ${top_content} 
                    </header>
                    <main>
                        ${main_content}
                    </main>
                    <footer class="flex justify-between bg-gray-100 rounded-b p-1 w-40 truncate">
                        ${uploads[i].original_name} 
                    </footer>
                </div>
            `;

            document.querySelector('#filtered_uploads').innerHTML += output;

            // if(document.querySelectorAll(`#play`)) {
            //     for (let i = 0; i < document.querySelectorAll(`#play`).length; i++) {
            //         let result = document.querySelectorAll(`#play`)[i];
            //         result.addEventListener("click", () => {
            //            // playMusic(result.alt);
            //         });  
            //     }
            // }
        }   
    } else {
        document.querySelector('#filtered_uploads').innerHTML = '';
        document.querySelector('#all_uploads').style.display = "block";
    }
}

let selected_files = [];
let selected_file_nr = 0;

function resetSelection() {
    selected_file_nr = 0;
    document.querySelectorAll('.active_file').forEach(active => {
        active.classList.remove('active_file');
    });
    document.querySelectorAll('.selectedFile').forEach(active => {
        active.remove();
    });
    document.querySelector('#filter').value = '';
    callFilter();
}

function select(e) {
    let file_id = '';

    let location = window.location.href;
    if(location.includes("settings")) {
        return;
    }

    if(!document.querySelector(`.selectedFile`)) {
        selected_file_nr = 0;
    }

    if(e.path[2].getAttribute('id') > 0) {
        e.path[2].classList.add('active_file');
        if(document.querySelector(`#nr_${e.path[2].getAttribute('id')}`)) {

        } else {
            selected_file_nr += 1;
            // console.log(e.path[1])
            e.path[1].innerHTML += `<div id="nr_${e.path[2].getAttribute('id')}" class="top-0 content-center absolute selectedFile w-40 min-h-full flex justify-center items-center text-white text-3xl">${selected_file_nr}</div>`;
            file_id = e.path[2].id;
        }

    }

    if(e.path[1].getAttribute('id') > 0) {
        e.path[1].classList.toggle('active_file');
        file_id = e.path[1].id;
    }
    
    if(selected_files.includes(file_id)) {
        let file_index = selected_files.indexOf(file_id);
        selected_files.splice(file_index, 1);
    } else {
        selected_files.push(file_id);
    }

    emits('add_files', selected_files);
}   

function loadFilePreview(files) {
   
    if(files) {
        if(files.length > 1) {
            for(let i=0; i<files.length; i++) {
                let source = URL.createObjectURL(files[i]);
                document.querySelector('#upload_info').style.display = 'none';
                document.querySelector('#filesPreview').style.display = 'flex';
                document.querySelector('#filesPreview').innerHTML += `<img class="w-40 h-40" src="${source}"/>`;
            };
        } else {
            let source = URL.createObjectURL(files[0]);
            document.querySelector('#upload_info').style.display = 'none';
            document.querySelector('#filesPreview').style.display = 'flex';
            document.querySelector('#filesPreview').innerHTML += `<img class="w-40 h-40" src="${source}"/>`;
        }
    }
}

function submit() {
    document.querySelector('#filesPreview').style.display = 'none';
    document.querySelector('#filesPreview').innerHTML = ``;
    document.querySelector('#upload_info').style.display = 'block';
    form.post(route('settings/uploads'));
};


onMounted(() => {


    let location = window.location.href;
    if(location.includes("settings")) {
        document.querySelector('#confirmButton').style.display = 'none';
    }
   // const { playMusic } = inject('playMusic');

    if(document.querySelector('#filter')) {
        document.querySelector('#filter').addEventListener("input", (e) => {
            callFilter();
        }); 
    }
})


</script>

<script>
    export default {
        methods: {
            close() {
            this.$emit('close');
            sessionStorage.setItem("UPLOADS", "CLOSED");
            }
        },
    }
</script>

