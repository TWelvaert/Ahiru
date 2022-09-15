<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
    import BreezeButton from "@/Components/Button.vue";
    import BreezeInput from "@/Components/Input.vue";
    import BreezeInputError from "@/Components/InputError.vue";
    import BreezeLabel from "@/Components/Label.vue";
    import { Head, useForm } from "@inertiajs/inertia-vue3";

    let data = defineProps({
        uploads_images: Array,
        uploads_audio: Array
    });

    const form = useForm({
        uploads: data["uploads"],
    });

    const submit = () => {
        form.post(route("settings/uploads"));
    };

</script>
    
<template>
<Head title="Advertisement"/>
<BreezeAuthenticatedLayout>      
    <div class="bg-white">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Uploads
        </h2>

        <hr>

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
        <div class="flex gap-4">
            <div v-for="image in data['uploads_images']">
                <div class="border-2 border-black w-40">
                    {{ image['original_name'] }}
                    <img class="w-40 h-40" :src="`/${image['path']}/${image['name']}`" />
                    Delete
                </div>
            </div>    
        </div>

        <b>Audio</b>
        <div class="flex gap-4">
            <div v-for="audio in data['uploads_audio']">
                <div class="border-2 border-black w-40">
                    {{ audio['original_name'] }}
                    Play | Delete
                </div>
            </div>    
        </div>
    </div>
</BreezeAuthenticatedLayout>
</template>