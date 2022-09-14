<template>
    <div class="bg-white">
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <div>
                <BreezeLabel
                    for="images"
                    value="upload files"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                />
                <BreezeInput
                    id="images"
                    multiple
                    type="file"
                    @input="form.uploads = $event.target.files"
                    class="border border-blue-300 p-2 w-full rounded mb-2"
                    required
                    autofocus
                />
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
                    <td>- Play</td>
                    <td><Link v-bind:href="`/settings/uploads/delete/${audio['id']}`">- Delete</Link></td>
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


