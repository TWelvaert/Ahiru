<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import TextareaVue from "@/Components/textarea.vue";

import { Head, useForm } from "@inertiajs/inertia-vue3";

let data = defineProps({
    title: String,
    slug: String,
    description: String,
    categories: Array,
    uploads: [],
});

const form = useForm({
    title: data["title"],
    slug: data["slug"],
    description: data["description"],
    categories: data["categories"],
    uploads: data["uploads"],
});

const submit = () => {
    form.post(route("advertisement/create"));
};
</script>

<template>
    <Head title="Advertisement" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-monument text-xl text-black leading-tight flex items-center justify-center">
                Advertisement
            </h2>
        </template>
        <div class="py-12 bg-white w-full sm:max-w-md mt-6 px-6 shadow-md overflow-hidden sm:rounded-lg items-center justify-center">
            <div class="w-3/5 sm:px-6 lg:px-8">
                <h2
                    class=" my-4  text-black font-monument"
                >
                    Create Advertisement
                </h2>

                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div>
                        <BreezeLabel
                            for="title"
                            value="Title"

                        />
                        <BreezeInput
                            id="title"
                            type="text"
                            v-model="form.title"
                            required
                            autofocus
                            autocomplete="title"
                        />
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.title"
                        />
                    </div>
                    <div>
                        <BreezeLabel
                            for="slug"
                            value="Slug"

                        />
                        <BreezeInput
                            id="slug"
                            type="text"

                            v-model="form.slug"
                            required
                            autofocus
                            autocomplete="slug"
                        />
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.slug"
                        />
                    </div>
                    <div>
                        <BreezeLabel
                            for="description"
                            value="Description"

                        />
                        <TextareaVue
                            id="description"
                            type="textarea"
                            v-model="form.description"
                            rows="6"
                            required
                            autofocus
                            autocomplete="description"
                            class="border-gray-300  focus:border-green-300 -webkit-appearance:none border-rounded focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />

                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>
                    <div>
                        <BreezeLabel
                            for="images"
                            value="Upload files"
                            class=" m-2  text-black"
                        />
                        <BreezeInput
                            id="images"
                            multiple
                            type="file"
                            @input="form.uploads = $event.target.files"
                            class=" m-2 text-black w-64"
                            required
                            autofocus
                        />
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.uploads"
                        />
                    </div>

                    <div v-for="category in categories" class="inline mx-2">
                        <BreezeCheckbox
                            :name="category.name"
                            :id="category.id"
                            v-model:checked="category.checked"
                        />
                        <BreezeLabel
                            :for="category.id"
                            :value="category.name"

                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton
                            name="form"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Create
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
