<script setup>
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

    const form1 = useForm({
        name: data['name'],
        email: data['email'],
    });

    const form2 = useForm({
        current_password: '',
        new_password: '',
        new_password_confirmation: '',
    });

    const submit_personal_info = () => {
        form1.post(route('settings/account'));
    };

    const submit_password = () => {
        form2.post(route('settings/account/password'), {
            onFinish: () => form2.reset('current_password', 'new_password', 'new_password_confirmation'),
        });
    };

</script>

<template>
    <Head title="Account Settings" />

    <BreezeAuthenticatedLayout>

        <template #header>
            <h2 class="font-monument text-xl text-black leading-tight flex items-center justify-center">
                Account Settings
            </h2>
        </template>
        <div class="flex items-center justify-center m-10">
        <div class="py-12 bg-white w-full sm:max-w-md mt-6 px-6 shadow-md overflow-hidden sm:rounded-lg items-center justify-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-xl text-black font-monument leading-tight flex items-center justify-center m-4">
                    Personal Information
                </h2>

                <form id="form1" @submit.prevent="submit_personal_info" novalidate>
                    <div>
                        <BreezeLabel for="name" value="Name" />
                        <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form1.name" required autofocus autocomplete="name" />
                        <BreezeInputError class="mt-2" :message="form1.errors.name" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="email" value="Email" />
                        <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form1.email" required autocomplete="username" />
                        <BreezeInputError class="mt-2" :message="form1.errors.email" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton name="form1" class="ml-4" :class="{ 'opacity-25': form1.processing }" :disabled="form1.processing">
                            Update
                        </BreezeButton>
                    </div>
                </form>


                <h2 class="text-xl text-black font-monument leading-tight flex items-center justify-center m-4">
                    Edit Password
                </h2>

                <form id="form2" @submit.prevent="submit_password" novalidate>
                    <div>
                        <BreezeLabel for="current_password" value="Current Password" />
                        <BreezeInput id="current_password" type="password" class="mt-1 block w-full" v-model="form2.current_password" required />
                        <BreezeInputError class="mt-2" :message="form2.errors.current_password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="new_password" value="New Password" />
                        <BreezeInput id="new_password" type="password" class="mt-1 block w-full" v-model="form2.new_password" required />
                        <BreezeInputError class="mt-2" :message="form2.errors.new_password" />
                    </div>

                    <div class="mt-4">
                        <BreezeLabel for="new_password_confirmation" value="Confirm New Password" />
                        <BreezeInput id="new_password_confirmation" type="password" class="mt-1 block w-full" v-model="form2.new_password_confirmation" required />
                        <BreezeInputError class="mt-2" :message="form2.errors.new_password_confirmation" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <BreezeButton name="form2" class="ml-4" :class="{ 'opacity-25': form2.processing }" :disabled="form2.processing">
                            Update
                        </BreezeButton>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </BreezeAuthenticatedLayout>
</template>
