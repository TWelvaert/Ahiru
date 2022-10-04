<script setup>
import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import TextareaVue from "@/Components/Textarea.vue";
import Uploads from "@/Plugins/Uploads.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    title: String,
    slug: String,
    excerpt: String,
    description: String,
    categories: Array,
    uploads: Array,
    user_uploads: Array,
});

const form = useForm({
    title: '',
    excerpt: '',
    description: '',
    categories: props["categories"],
    uploads: '',
});

let selected_files;

function openUploads() {
   sessionStorage.setItem("UPLOADS", "OPEN");
}

const submit = () => {
    form.post(route("admin/news/create"));
};

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
        document.querySelector('#selectedFiles').innerHTML += `<img class="w-20 h-20 rounded" src="../../${upload.path}/${upload.name}">`;
    });
}
</script>

<template>
    <Head title="Create_article" />
    <AdminPanelLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News Article
            </h2>
        </template>
        <div class="flex justify-center">
            <div class="w-3/5 sm:px-6 lg:px-8">
                <h2
                    class="block my-4 uppercase font-bold text-xs text-gray-700"
                >
                    Create News Article
                </h2>
                <hr />
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div>
                        <BreezeLabel for="title" value="title" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"/>
                        <BreezeInput id="title" type="text" class="border border-blue-300 p-2 w-full rounded" v-model="form.title" required autofocus autocomplete="title" />
                        <BreezeInputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div>
                        <BreezeLabel for="excerpt" value="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                        <BreezeInput id="excerpt" type="text" class="border border-blue-300 p-2 w-full rounded" v-model="form.excerpt" required autofocus autocomplete="excerpt" />
                        <BreezeInputError class="mt-2" :message="form.errors.excerpt" />
                    </div>
                    <div>
                        <BreezeLabel for="description" value="description" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"/>
                        <TextareaVue id="description" type="textarea" class="border border-blue-300 p-2 w-full rounded" v-model="form.description" rows="6" required autofocus autocomplete="description"/>
                        <BreezeInputError class="mt-2" :message="form.errors.description" />
                    </div>
                    <div class="min-h-full">
                        <button class="bg-slate-400 text-white w-full mt-2 mb-2" type="button" @click="showing = true; openUploads()">Add media (image or audio file)</button>
                        <Uploads class="absolute min-h-full w-full left-0 top-0" v-if="showing"  @close="showing = false" @add_files="processFiles" :user_uploads="user_uploads" />
                        <div id="selectedFiles" class="flex gap-1 flex-wrap"></div>
                    </div>
                    <div v-for="category in categories" class="inline ml-5 ">
                        <BreezeCheckbox :name="category.name" :id="category.id" v-model:checked="category.checked" />
                        <BreezeLabel :for="category.id" :value="category.name" class="inline-block mb-2 uppercase font-bold text-x" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton name="form" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminPanelLayout>
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
