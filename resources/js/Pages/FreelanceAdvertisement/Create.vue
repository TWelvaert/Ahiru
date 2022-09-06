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
});

const form = useForm({
    title: data["title"],
    slug: data["slug"],
    description: data["description"],
    categories: data["categories"],
});

const submit = () => {
    form.post(route("advertisement/create"));
};
</script>

<template>
    <Head title="Advertisement" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Advertisement
            </h2>
        </template>
        <div class="flex justify-center">
            <div class="w-3/5 sm:px-6 lg:px-8">
                <h2
                    class="block my-4 uppercase font-bold text-xs text-gray-700"
                >
                    Create Advertisement
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
                            class="border border-blue-300 p-2 w-full rounded"
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
                    
                        <div v-for="category in categories" class="inline mx-2">
                            <BreezeCheckbox :name="category.name" :id="category.id" v-model:checked="category.checked" />
                            <BreezeLabel
                                :for="category.name"
                                :value="category.name"
                                class="inline-block mb-2 ml-2 uppercase font-bold text-xs text-gray-700"
                            />
                        </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton
                            name="form"
                            class="ml-4"
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