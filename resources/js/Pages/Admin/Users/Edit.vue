<script setup>
    import AdminPanelLayout from "@/Layouts/AdminPanelLayout.vue";  
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import BreezeButton from '@/Components/Button.vue';
    import BreezeInput from '@/Components/Input.vue';
    import BreezeInputError from '@/Components/InputError.vue';
    import BreezeLabel from '@/Components/Label.vue';
    import { Head, useForm } from '@inertiajs/inertia-vue3';

    let data = defineProps({
        name: String,
        email: String,
    });
  
    const form = useForm({
        name: data['name'],
        slug: data['slug'],
        email: data['email'],
    });

    const submit = () => {
        form.post(route(`users/${data['slug']}/edit`));
    };


</script>
    
<template>
    <AdminPanelLayout>

  <!-- Personal information section -->

  <div class="px-6">
                    <div class="sm:px-6 lg:px-8">
                        <h2 class="text-xl text-black font-monument">
                            Edit user account: {{ name }}
                        </h2>
                        <hr class="m-4" style="width:100%;text-align:left;margin-left:0">

                        <form id="form1" @submit.prevent="submit_personal_info" novalidate>

                            <div class="mt-4">
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                    required autofocus autocomplete="name" />
                                <BreezeInputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="email" value="Email" />
                                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                    required autocomplete="username" />
                                <BreezeInputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="mt-4">
                                    <BreezeButton name="form1" class="ml-4" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        Update
                                    </BreezeButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


    </AdminPanelLayout>
</template>