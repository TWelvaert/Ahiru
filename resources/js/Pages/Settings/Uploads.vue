<template>
    <div class="bg-white">
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <div>
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <BreezeInput id="dropzone-file" @input="form.uploads = $event.target.files" type="file" class="hidden" multiple />
                    </label>
                </div> 
                <BreezeInputError class="mt-2" :message="form.errors.uploads"/>

                <BreezeButton name="form" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Upload
                </BreezeButton>
            </div>
        </form>
        
        <b>Images</b>
        <div class="flex gap-2">
            <div v-for="image in uploads_images">
                <div @click="e => select(e)" :id="image['id']" :class="{active: isActive}">
                    <img class="w-20 h-20" :src="`/${image['path']}/${image['name']}`" />
                    <Link @click="delete_file" v-bind:href="`/settings/uploads/delete/${image['id']}`">Delete</Link>
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
</template>


<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import BreezeButton from "@/Components/Button.vue";
    import BreezeInput from "@/Components/Input.vue";
    import BreezeInputError from "@/Components/InputError.vue";
    import BreezeLabel from "@/Components/Label.vue";
    import { useForm } from "@inertiajs/inertia-vue3";

    let uploads_images = [];
    let uploads_audio = [];
    let selected_files = [];

    let props = defineProps({
        user_uploads: Array,
    });

    function select(e) {
        e.target.parentElement.classList.toggle('active_file');
        let file_id = e.path[1].id;

        if(selected_files.includes(file_id)) {
            let file_index = selected_files.indexOf(file_id);
            selected_files.splice(file_index, 1); 
        } else {
            selected_files.push(file_id);
        }

        emits('add_files', selected_files)

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


