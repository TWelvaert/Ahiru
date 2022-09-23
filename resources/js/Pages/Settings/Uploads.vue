


<template>
    <Dashboard>
    <div class="bg-white w-full h-full m-4 p-2">
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <div>
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Images: SVG, PNG, JPG, GIF</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Audio: MP3, WAV</p>
                            <div id="filesPreview" class=" absolute flex gap-2 m-4">

                            </div>
                        </div>
                        <BreezeInput id="dropzone-file" @input="form.uploads = $event.target.files;loadFilePreview($event.target.files)" type="file" class="hidden" multiple />
                    </label>
                </div> 
                <BreezeInputError class="mt-2" :message="form.errors.uploads"/>

                <div class="float-right mt-2 mr-2">
                    <BreezeButton name="form" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Upload
                    </BreezeButton>
                </div>

            </div>
        </form>

        <div class="flex gap-2 mt-4">
            <div v-for="image in uploads_images">
                <div @click="e => select(e)" :id="image.id" :class="{active: isActive}">
                    <header class="flex justify-between bg-gray-100 rounded-t p-1 w-40 truncate">
                        <div>
                            <Link @click="delete_file" class="cursor-pointer" v-bind:href="`/settings/uploads/delete/${image.id}`">Edit</Link>
                        </div>
                        <div>
                            <Link @click="delete_file" class="cursor-pointer" v-bind:href="`/settings/uploads/delete/${image.id}`">Delete</Link>
                        </div>
                        
                    </header>
                    <main class="relative">
                        <img class="w-40 h-40 z-0 cursor-pointer" :src="`/${image.path}/${image.name}`" />
                    
                    </main>
                   
                    <footer class="flex justify-between bg-gray-100 rounded-b p-1 w-40 truncate">
                        <span>{{ image.name }}</span>
                    </footer>
                </div>
            </div>
        </div>

        <b>Audio</b>
        <div class="">
            <table v-for="audio in uploads_audio">
                <tr @click="e => select(e)" :id="audio['id']" :class="{active: isActive}">
                    <td>{{ audio['original_name'] }}</td>
                   <td><span v-on:click="$callMusicPlayer(audio['name'])">[Play]</span></td>
                    <td><Link v-bind:href="`/settings/uploads/delete/${audio['id']}`">[Delete]</Link></td>
                </tr>
            </table>
        </div>
    </div>
</Dashboard>
</template>


<script setup>
    import { Link, useForm } from '@inertiajs/inertia-vue3';
    import BreezeButton from "@/Components/Button.vue";
    import BreezeInput from "@/Components/Input.vue";
    import BreezeInputError from "@/Components/InputError.vue";
    import Dashboard from '@/Pages/Dashboard.vue';

    let uploads_images = [];
    let uploads_audio = [];
    let selected_files = [];

    let props = defineProps({
        user_uploads: Array,
    });

    function select(e) {

        if(e.path[2].getAttribute('id') > 0) {
            e.path[2].classList.toggle('active_file');
        }
        
        let file_id = e.path[2].id;

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
            const filesPreview = document.querySelector('#filesPreview');

            if(files.length > 1) 
            {
                for(let i=0; i<files.length; i++) {
                    let source = URL.createObjectURL(files[i]);
                    filesPreview.innerHTML += `<img class="w-40 h-40" src="${source}"/>`;
                };
            } 
            else 
            {
                let source = URL.createObjectURL(files[0]);
                filesPreview.innerHTML += `<img class="w-40 h-40" src="${source}"/>`;
            }
        }
    }

    const emits = defineEmits(['add_files'])

    props.user_uploads.forEach(upload => {
        if(upload.type == 'image') {
            uploads_images.push(upload);
        }
        if(upload.type == 'audio') {
            uploads_audio.push(upload);
        }
    });

    const form = useForm({
        uploads: '',
    });

    const submit = () => {
        form.post(route("settings/uploads"));
    };

</script>


