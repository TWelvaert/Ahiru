<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeLabel from "@/Components/Label.vue";
import TextareaVue from "@/Components/textarea.vue";

import { Head, useForm } from "@inertiajs/inertia-vue3";

let data = defineProps({
    title: String,
    excerpt: String,
    slug: String,
    description: String,
    categories: Array,
    // uploads: Array,
});
console.log(data["slug"]);

const form = useForm({
    title: data["title"],
    slug: data["slug"],
    excerpt: data["excerpt"],
    description: data["description"],
    categories: data["categories"],
    // uploads: data["uploads"],
});

const submit = () => {
    form.post(`/admin/news/${data["slug"]}/update`);
};
</script>

<template>
    <Head title="News Article" />
    <BreezeAuthenticatedLayout>
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
                    Update News Atricle for
                </h2>
                <hr />
                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel
                            for="title"
                            value="title"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                        />
                        <BreezeInput
                            id="title"
                            type="text"
                            v-model="form.title"
                            class="border border-blue-300 p-2 w-full rounded"
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
                            value="slug"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                        />
                        <BreezeInput
                            id="slug"
                            type="text"
                            class="border border-blue-300 p-2 w-full rounded"
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
                            for="excerpt"
                            value="excerpt"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                        />
                        <BreezeInput
                            id="excerpt"
                            type="text"
                            v-model="form.excerpt"
                            class="border border-blue-300 p-2 w-full rounded"
                            required
                            autofocus
                            autocomplete="excerpt"
                        />
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.excerpt"
                        />
                    </div>
                    <div>
                        <BreezeLabel
                            for="description"
                            value="description"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full"
                        />
                        <TextareaVue
                            id="description"
                            type="textarea"
                            class="border border-blue-300 p-2 w-full rounded"
                            v-model="form.description"
                            rows="6"
                            required
                            autofocus
                            autocomplete="description"
                        />
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.description"
                        />
                    </div>
                    <!-- <div v-for="upload in uploads" class="w-20 inline-block">
                        <div v-if="upload['type'] === 'image'">
                            <img
                                :src="`/${upload['path']}/${upload['name']}`"
                            />
                        </div>
                        <div v-if="upload['type'] === 'audio'">
                            {{ upload["name"] }}
                        </div>
                    </div> -->
                    <!-- <div>
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
                        <BreezeInputError
                            class="mt-2"
                            :message="form.errors.uploads"
                        />
                    </div> -->
                    <div v-for="category in categories" class="inline ml-2">
                        <BreezeCheckbox
                            :name="category.name"
                            :id="category.id"
                            v-model:checked="category.checked"
                        />
                        <BreezeLabel
                            :for="category.id"
                            :value="category.name"
                            class="inline-block mb-2 uppercase font-bold text-xs text-white"
                        />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton
                            name="form"
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>