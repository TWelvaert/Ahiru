<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import TextareaVue from "@/Components/textarea.vue";
import Uploads from "@/Plugins/Uploads.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    user_uploads: Array,
    categories: Array,
    uploads: Array,
});

let selected_files;

function openUploads() {
   sessionStorage.setItem("UPLOADS", "OPEN");
}

let form = useForm({
    title: '',
    slug: '',
    description: '',
    categories: props["categories"],
    uploads: '',
});

const submit = () => {
    form.post(route("advertisement/create"));
};


function processFiles(files){

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
        document.querySelector('#selectedFiles').innerHTML += `<img class="w-20 h-20 rounded" src="../${upload.path}/${upload.name}">`;
    });



    

}
</script>

<template>

    <Head title="Advertisement" />
    <Dashboard>
        <template #header>
            <h2 class="font-monument text-xl text-black  flex items-center justify-center">
                Advertisement
            </h2>
        </template>
        <div class="flex items-center justify-center px-12">
            <div class="py-14 bg-white w-full mt-9 bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg p-4">   
                <div class="flex items-center justify-center">
                    <h2 class=" my-2  text-black font-monument">
                        Create Advertisement
                    </h2>
                </div>

                <hr class="min-w-full ml-0 m-4">

                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div>
                        <BreezeLabel for="title" value="Title" />
                        <BreezeInput id="title" type="text" v-model="form.title" class="block w-full" required autofocus autocomplete="title" />
                        <BreezeInputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div class="mt-2">
                        <BreezeLabel for="description" value="Description" />
                        <TextareaVue id="description" type="textarea" v-model="form.description" rows="8" required autofocus autocomplete="description" class="border-gray-300  focus:border-green-300 block w-full  border-rounded focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                        <BreezeInputError class="mt-2" :message="form.errors.description"/>
                    </div>
                    <div class="min-h-full">
                        <button class="bg-slate-400 text-white w-full mt-2 mb-2" type="button" @click="showing = true; openUploads()">Add media (image or audio file)</button>
                        <Uploads class="absolute min-h-full w-full left-0 top-0" v-if="showing"  @close="showing = false" @add_files="processFiles" :user_uploads="user_uploads" />
                        <div id="selectedFiles" class="flex gap-1 flex-wrap"></div>
                    </div>
                    <div v-for="category in categories" class="flex items-center">
                        <BreezeCheckbox :name="category.name" :id="category.id" v-model:checked="category.checked" />
                        <BreezeLabel :for="category.id" :value="category.name" />
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <BreezeButton class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </Dashboard>
</template>

<script>

export default {
        name: 'HeaderComponent',
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