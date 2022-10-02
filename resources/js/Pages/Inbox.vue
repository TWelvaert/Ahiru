<script setup>
    import Dashboard from "@/Pages/Dashboard.vue";
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Dashboard class="min-h-full">
        <!-- component -->

        <main class="flex min-w-full min-h-full mt-8">

            <section class="flex flex-col pt-3 w-4/12 bg-gray-50 min-h-full overflow-y-scroll">
                <label class="px-3">
                    <input class="rounded-lg p-4 bg-gray-100 transition duration-200 focus:outline-none focus:ring-2 w-full" placeholder="Search..." />
                </label>
                <ul v-if="all_messages" v-for="message in all_messages" class="mt-6">
                    <Link id="user2_profile_link"  class="cursor-pointer" v-bind:href="'/inbox/message/' + message.to_user.slug"> 
                   
                        <li class="flex gap-2 py-5 border-b px-3 transition hover:bg-indigo-100">
                            <div class="h-12 w-12 mt-1 rounded-full overflow-hidden">
                                
                                <img :src="'/uploads/'+message.to_user.profile_picture" loading="lazy" class="h-full w-full object-cover" />
                            </div>
                            <div>
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">{{ message.to_user.name}}</h3>
                                <!-- <p class="text-md text-gray-400">23m ago</p> -->
                                </div>
                                <div class="text-md italic text-gray-400">
                                    {{ message.message}}
                                </div>
                            </div>

                        </li>
                    </Link>
                </ul>
            </section>

            <section class="w-8/12 px-4 flex min-h-full flex-col bg-white">
                <div v-if="user2" class="flex justify-between items-center border-b-2">
                    <div  class="flex space-x-4 p-1 items-center">
                        <div class="h-12 w-12 rounded-full overflow-hidden">
                            <img id="user2_profile_image" src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
                        </div>
                        <div class="flex flex-col">
                            <Link id="user2_profile_link"  class="cursor-pointer" v-bind:href="'/profile/'+user2.slug"> 
                                <h3 id="user2_name" class="font-semibold text-lg">{{ user2.name }}</h3>
                            </Link> 
                        </div>
                    </div>
                    <div>
                        <ul class="flex text-gray-400 space-x-4">
                            <li class="w-6 h-6">
                                <Link class="cursor-pointer" v-bind:href="'/inbox/message/'+user2.slug+'/delete'"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </Link> 
                            </li>
                        </ul>
                    </div>
                </div>
                <section id="messageField" style="height:100%" class="mt-2 flex flex-col gap-1 text-gray-600 leading-7 tracking-wider relative">
                    
                    <div v-if="messages" v-for="message in messages">
                        <div v-if="message.user_id == user_auth.id" class="flex justify-end">
                            <p class="bg-green-300 rounded-xl w-fit max-w-3/5 p-1 px-2 right-0">
                                {{ message.message }}
                            </p>
                        </div>
                        <div v-else="message.to_user == user2.id">
                            <p class="bg-slate-100 rounded-xl w-fit max-w-3/5 p-1 px-2 left-0">
                                {{ message.message }}
                            </p>
                        </div> 
                    </div>
                    <div v-else="!messages">
                        <p v-if="user2" class="text-gray-400 mt-2 text-sm text-center">                      
                            There are no messages in this conversation<br>
                            Write and send a new message to start a new conversation.
                        </p> 
                        <p v-else="!user2" class="text-gray-400 mt-2 text-sm text-center">                      
                            Welcome to your inbox !
                        </p>   
                    </div>
                    

                </section>

                <section class="mt-6 rounded bg-black mb-3 p-1">
                    <textarea id="textArea" class="w-full border-0 bg-gray-50 p-2 rounded" placeholder="Write your message here..." rows="3"></textarea>
                    <div class="flex items-center justify-end p-2">
                        <button id="sendButton" class="bg-green-300 text-gray-600 px-6 py-2 rounded">
                            Send
                        </button>
                    </div>
                </section>
            </section>

        </main>
    </Dashboard>
</template>

<script>

    export default {
        props: ['user_auth', 'all_messages', 'messages', 'user2', 'user2_profile_img'],
        data() {
            return {
                conversationStarted: false,
            }
        },
        mounted() {
            if(this.user2 != 0) {
                if(this.user2_profile_img != 0) {
                    document.querySelector('#user2_profile_image').src = '/uploads/'+this.user2_profile_img;
                }
                this.conversationStarted = true;
            }

            document.querySelector('#sendButton').addEventListener('click', () => {
                let message = document.querySelector('#textArea').value;
                let messageField =  document.querySelector('#messageField');

                if(this.conversationStarted == false) {
                    this.conversationStarted = true;
                    messageField.innerHTML = '';
                }

                messageField.innerHTML += `
                    <div class="flex justify-end">
                        <p class="bg-green-300 rounded-full w-fit max-w-3/5 p-1 px-2 right-0">
                            ${message}
                        </p>
                    </div>
                `;

                let currentObj = this;
                axios.post(`/inbox/message/${this.user2.slug}`, {
                    message: message,
                    to: this.user2,
                })
                .then(function (response) {
                })
                .catch(function (error) {
                    currentObj.output = error;
                    console.log(error)
                });
            });
        }
    }
    
    
</script>
