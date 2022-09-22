<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import TextareaVue from "@/Components/textarea.vue";
import Modal from "@/Components/Modal.vue";
import Uploads from "@/Pages/Settings/Uploads.vue";
import { reactive } from 'vue'
import { Head, useForm } from "@inertiajs/inertia-vue3";

let data = defineProps({
    user_uploads: Array,
    showModal: Boolean,
    categories: Array,
    uploads: Array,
});

let selected_files;

let form = useForm({
    title: '',
    slug: '',
    description: '',
    categories: data["categories"],
    uploads: '',
});

const submit = () => {
    form.post(route("advertisement/create"));
};

function processFiles(files){
    selected_files = files;
    form.uploads = files;
}
</script>

<template>

    <Head title="Advertisement" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-monument text-xl text-black  flex items-center justify-center">
                Advertisement
            </h2>
        </template>
        <div class="flex items-center justify-center px-12">
            <div
                class="py-14 bg-white w-full mt-9 overflow-hidden bg-opacity-80 backdrop-blur-lg rounded drop-shadow-lg flex flex-row items-center justify-center">
                <div class="">
                    <div class="flex items-center justify-center">
                        <h2 class=" my-2  text-black font-monument">
                            Create Advertisement
                        </h2>
                    </div>


                    <hr class="m-4" style="width:100%;text-align:left;margin-left:0">


                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div>
                            <BreezeLabel for="title" value="Title" />
                            <BreezeInput id="title" type="text" v-model="form.title" class="block w-full" required
                                autofocus autocomplete="title" />
                            <BreezeInputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div>
                            <BreezeLabel for="description" value="Description" />
                            <TextareaVue id="description" type="textarea" v-model="form.description" rows="8" required
                                autofocus autocomplete="description"
                                class="border-gray-300  focus:border-green-300 block w-full  border-rounded focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm" />

                            <BreezeInputError
                                class="mt-2"
                                :message="form.errors.description"
                            />
                        </div>
                
                        <div class="bg-white">
                            <button class="bg-slate-400 text-white w-full mt-2 mb-2" type="button" @click="showModal = true">Add media (image or audio file)</button>
                         
                                <Modal class="absolute min-h-full w-full left-0 top-0" v-if="showModal" @close="showModal = false">
                                    <Uploads  @add_files="processFiles" :user_uploads="data['user_uploads']" />
                                </Modal>
                       
                        </div>

                        <div v-for="category in categories" class="flex items-center">
                            <BreezeCheckbox :name="category.name" :id="category.id"
                                v-model:checked="category.checked" />
                            <BreezeLabel :for="category.id" :value="category.name" />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <BreezeButton name="form" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Create
                            </BreezeButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    export default {
        data() {
            return {
                showModal: false
            }
        }
    }
</script>
