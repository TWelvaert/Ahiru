<script setup>
    import Dashboard from "@/Pages/Dashboard.vue";
</script>

<template>
    <Dashboard :user="user" class="min-h-full">
        <!-- component -->

        <main class="flex min-w-full min-h-full mt-8">

            <section class="flex flex-col pt-3 w-4/12 bg-gray-50 min-h-full overflow-y-scroll">
                <label class="px-3">
                    <input class="rounded-lg p-4 bg-gray-100 transition duration-200 focus:outline-none focus:ring-2 w-full" placeholder="Search..." />
                </label>
                <ul class="mt-6">
                    <li class="py-5 border-b px-3 transition hover:bg-indigo-100">
                        <a href="#" class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
                            <p class="text-md text-gray-400">23m ago</p>
                        </a>
                        <div class="text-md italic text-gray-400">
                            You have been invited!
                        </div>
                    </li>
                </ul>
            </section>

            <section class="w-8/12 px-4 flex min-h-full flex-col bg-white">
                <div class="flex justify-between items-center border-b-2">
                    <div class="flex space-x-4 items-center">
                        <div class="h-12 w-12 rounded-full overflow-hidden">
                            <img src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
                        </div>
                        <div class="flex flex-col">
                            <h3 class="font-semibold text-lg">Akhil Gautam</h3>
                            <p class="text-light text-gray-400">
                                akhil.gautam123@gmail.com
                            </p>
                        </div>
                    </div>
                    <div>
                        <ul class="flex text-gray-400 space-x-4">
                            <li class="w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                                </svg>
                            </li>
                            <li class="w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </li>

                            <li class="w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
                <section id="messageField" style="height:100%" class="mt-2 flex flex-col gap-1 text-gray-600 leading-7 tracking-wider relative">
                    <p class="text-gray-400 text-sm text-center">                      
                        There are no messages in this conversation<br>
                        Write and send a new message to start a conversation.
                    </p>
                </section>

                <section class="mt-6 rounded bg-black mb-3 p-1">
                    <textarea id="textArea" class="w-full border-0 bg-gray-50 p-2 rounded" placeholder="Write your message here..." rows="3"></textarea>
                    <div class="flex items-center justify-between p-2">
                        <button class="h-6 w-6 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                        </button>
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
        props: ['user'],
        data() {
            return {
                conversationStarted: false,
            }
        },
        mounted() {
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
                    console.log(message)
            });
        }
    }
    
    
</script>
