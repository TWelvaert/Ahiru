<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import TextareaVue from "@/Components/textarea.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeButton from "@/Components/Button.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

let data = defineProps({
    news_article: String,
    news_comments: String,
    news_author: String,
    comment: String,
});

const form = useForm({
    news_comments: data["news_comments"],
    comment: data["comment"],
});

const submit = () => {
    form.post(`/news/article/${data["news_article"]["slug"]}/comment`);
};
</script>

<template>
    <Head title="NewsArticle" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                News Article
            </h2>
        </template>
        <div class="py-12 text-white w-50">
            <div class="max-w-7xl mx-20 sm:px-6 lg:px-8">
                <small class="text-green-300">this is title</small>
                <h2>{{ news_article.title }}</h2>

                <hr />
                <small class="text-green-300">this is description</small>
                <p>{{ news_article.description }}</p>

                <hr />
                <small class="text-green-300"
                    >this is auth name and publish date</small
                >
                <p>{{ news_author.name }}</p>
                <p>{{ news_author.created_at }}</p>

                <hr />
                <small class="text-green-300">This are the comments</small>

                <div v-for="news_comment in news_comments">
                    <p>{{ news_comment.comment }}</p>
                </div>

                <!-- <div v-for="upload in uploads" class="w-20">
                    <div v-if="upload['type'] === 'image'">
                        <img :src="`/${upload['path']}/${upload['name']}`" />
                    </div>
                    <div v-if="upload['type'] === 'audio'">
                        {{ upload["name"] }}
                    </div>
                </div> -->
                <hr />
                <form @submit.prevent="submit">
                    <h2 class="mt-2">Want to participate?</h2>

                    <div class="mt-6">
                        <div>
                            <BreezeLabel for="comment" value="comment" />
                            <TextareaVue
                                id="comment"
                                type="textarea"
                                v-model="form.comment"
                                rows="6"
                                required
                                class="text-gray-700"
                            />
                            <BreezeInputError
                                class="mt-2"
                                :message="form.errors.news_comments"
                            />
                        </div>
                    </div>

                    <div class="mt-2">
                        <BreezeButton
                            name="form"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </BreezeButton>
                    </div>
                </form>

                <p class="font-semibold mt-2">
                    <a href="/register" class="hover:underline text-green-400"
                        >Register</a
                    >
                    or
                    <a href="/login" class="hover:underline text-green-500"
                        >log in</a
                    >
                    to leave a comment.
                </p>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>