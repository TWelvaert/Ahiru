<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import TextareaVue from "@/Components/textarea.vue";

import { Head, useForm } from "@inertiajs/inertia-vue3";

let data = defineProps({
    title: String,
    description: String,
});
const form = useForm({
    title: data["title"],
    description: data["description"],
});
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
                <h2 class="block my-4 uppercase font-bold text-xs text-gray-700">
                    edit advertisement
                </h2>
                <hr />
                <form @submit.prevent="submit">
                    <div>
                        <BreezeLabel for="title" value="title"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                        <BreezeInput id="title" type="text" class="border border-blue-300 p-2 w-full rounded"
                            v-model="form.title" required autofocus autocomplete="title" />
                        <BreezeInputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div>
                        <BreezeLabel for="description" value="description"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                        <TextareaVue id="description" type="textarea" class="border border-blue-300 p-2 w-full rounded"
                            v-model="form.description" rows="6" required autofocus autocomplete="description" />
                        <BreezeInputError class="mt-2" :message="form.errors.description" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton name="form" class="ml-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Update
                        </BreezeButton>
                    </div>

                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>