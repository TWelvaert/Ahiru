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

<!-- Template -->

<template>

    <Head title="Account Settings" />

    <BreezeAuthenticatedLayout>

        <!-- Header -->

        <template #header>
            <h2 class="font-monument text-xl text-black leading-tight flex items-center justify-center">
                Account Settings
            </h2>
        </template>

        <!-- User avatar -->

        <div class="flex items-center justify-center">
            <img class="h-32 w-32 mt-8 border-gray-900 border-4 rounded-full shadow-2xl "
                src="../../../assets/images/logologo.png" alt="">
        </div>
        <div class=" flex items-center justify-center">
            <svg class="cursor-pointer" ahref="www.google.com" xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50"
                style=" fill:#000000;">
                <path
                    d="M 14 4 C 8.4886661 4 4 8.4886661 4 14 L 4 36 C 4 41.511334 8.4886661 46 14 46 L 36 46 C 41.511334 46 46 41.511334 46 36 L 46 14 C 46 8.4886661 41.511334 4 36 4 L 14 4 z M 14 6 L 36 6 C 40.430666 6 44 9.5693339 44 14 L 44 36 C 44 40.430666 40.430666 44 36 44 L 14 44 C 9.5693339 44 6 40.430666 6 36 L 6 14 C 6 9.5693339 9.5693339 6 14 6 z M 21.132812 12 C 20.079884 12 19.101556 12.55485 18.560547 13.457031 L 16.724609 16.513672 C 16.542289 16.815645 16.218154 17 15.867188 17 L 11 17 C 9.9069372 17 9 17.906937 9 19 L 9 35 C 9 36.093063 9.9069372 37 11 37 L 39 37 C 40.093063 37 41 36.093063 41 35 L 41 19 C 41 17.906937 40.093063 17 39 17 L 34.132812 17 C 33.779742 17 33.456382 16.817444 33.275391 16.515625 A 1.0001 1.0001 0 0 0 33.275391 16.513672 L 31.439453 13.457031 C 30.898444 12.55485 29.919615 12 28.867188 12 L 21.132812 12 z M 12 14 C 11.448 14 11 14.448 11 15 L 11 16 L 15 16 L 15 15 C 15 14.448 14.552 14 14 14 L 12 14 z M 21.132812 14 L 28.867188 14 C 29.21876 14 29.543618 14.182556 29.724609 14.484375 A 1.0001 1.0001 0 0 0 29.724609 14.486328 L 31.558594 17.542969 C 32.099603 18.445103 33.079884 19 34.132812 19 L 39 19 L 39 35 L 11 35 L 11 19 L 15.867188 19 C 16.919615 19 17.897599 18.446016 18.439453 17.544922 A 1.0001 1.0001 0 0 0 18.441406 17.542969 L 20.275391 14.486328 A 1.0001 1.0001 0 0 0 20.275391 14.484375 C 20.456335 14.18265 20.779742 14 21.132812 14 z M 25 20 C 21.145849 20 18 23.145852 18 27 C 18 30.854148 21.145849 34 25 34 C 28.854151 34 32 30.854148 32 27 C 32 23.145852 28.854151 20 25 20 z M 34 20 A 1 1 0 0 0 34 22 A 1 1 0 0 0 34 20 z M 25 22 C 27.773271 22 30 24.226731 30 27 C 30 29.773269 27.773271 32 25 32 C 22.226729 32 20 29.773269 20 27 C 20 24.226731 22.226729 22 25 22 z">
                </path>
            </svg>
        </div>

        <!-- Account settings card -->

        <div class="m-10">

            <!-- Information Card -->

            <div class="py-24 bg-white w-full sm:rounded-lg flex flex-row items-center justify-center">

                <!-- Personal information section -->

                <div class="px-6">
                    <div class="sm:px-6 lg:px-8">
                        <h2 class="text-xl text-black font-monument">
                            Personal Information
                        </h2>
                        <hr class="m-4" style="width:100%;text-align:left;margin-left:0">

                        <form id="form1" @submit.prevent="submit_personal_info" novalidate>

                            <div>
                                <BreezeLabel for="display_name" value="Display Name" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full"
                                    v-model="form1.display_name" required autofocus autocomplete="display name" />
                                <BreezeInputError class="mt-2" :message="form1.errors.name" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="name" value="Name" />
                                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form1.name"
                                    required autofocus autocomplete="name" />
                                <BreezeInputError class="mt-2" :message="form1.errors.name" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="email" value="Email" />
                                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form1.email"
                                    required autocomplete="username" />
                                <BreezeInputError class="mt-2" :message="form1.errors.email" />
                            </div>
                            <div class="flex items-center justify-center">
                                <div class="mt-4">
                                    <BreezeButton name="form1" class="ml-4" :class="{ 'opacity-25': form1.processing }"
                                        :disabled="form1.processing">
                                        Update
                                    </BreezeButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password information section -->

                <div class="px-6">
                    <div class="sm:px-6 lg:px-8">
                        <h2 class="text-xl text-black font-monument">
                            Edit Password
                        </h2>
                        <hr class="m-4" style="width:100%;text-align:left;margin-left:0">

                        <form id="form2" @submit.prevent="submit_password" novalidate>
                            <div>
                                <BreezeLabel for="current_password" value="Current Password" />
                                <BreezeInput id="current_password" type="password" class="mt-1 block w-full"
                                    v-model="form2.current_password" required />
                                <BreezeInputError class="mt-2" :message="form2.errors.current_password" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="new_password" value="New Password" />
                                <BreezeInput id="new_password" type="password" class="mt-1 block w-full"
                                    v-model="form2.new_password" required />
                                <BreezeInputError class="mt-2" :message="form2.errors.new_password" />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="new_password_confirmation" value="Confirm New Password" />
                                <BreezeInput id="new_password_confirmation" type="password" class="mt-1 block w-full"
                                    v-model="form2.new_password_confirmation" required />
                                <BreezeInputError class="mt-2" :message="form2.errors.new_password_confirmation" />
                            </div>

                            <div class="mt-4 flex items-center justify-center">
                                <BreezeButton name="form2" class="ml-4" :class="{ 'opacity-25': form2.processing }"
                                    :disabled="form2.processing">
                                    Update
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
