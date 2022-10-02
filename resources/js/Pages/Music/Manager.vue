<script setup>

    import Dashboard from '@/Pages/Dashboard.vue';
    import Uploads from "@/Plugins/Uploads.vue";
    import BreezeButton from "@/Components/Button.vue";
    import BreezeLabel from "@/Components/Label.vue";

</script>

<template>
    <Dashboard>
        <div class="flex items-center justify-center flex-col min-w-full relative">
            <span class="text-center bg-black text-white w-full py-4">
                Welcome to the Music Manager !<br>
                Via this tool you can release and manage your music on our platform.<br><br>

                You can open the uploader/file selector by clicking the button below.
            </span>
          
            <div class="min-h-full flex items-center justify-center flex-col min-w-full relative mt-2">
                <BreezeButton v-if="showUploader == 999" type="button" @click="showUploader = 100; openUploader('100')">
                    File Selector
                </BreezeButton> 
               
                    <Uploads id="100" v-if="showUploader == 100"  @close="this.showUploader = 999;" @add_files="processFiles" :user_uploads="user_uploads_audio" class="uploader min-h-full min-w-full left-0 top-0 z-10 absolute" />
               
                <div id="selectedFiles"></div>
            </div>
        </div>

        <div id="tracks" class="relative">
            <form @submit="publishForm">

                <div v-if="this.error != 'None'" class="ml-2">
                    <b><span class="text-red-800">ERROR: </span></b><span class="text-red-700"> {{ this.error }}</span>
                </div>

                <div v-for="audio_upload in this.user_uploads_audio" > 
                    <div v-for="(file, index) in selected_music" :key="index"> 
                        <div v-if="file == audio_upload.id"> 
                            <div class="flex mt-2">
                                <div class="relative">
                                    <img :id="'coverImage'+index" class="cursor-pointer w-40 h-40 z-0" src="/assets/img/play_audio.png"/>
                                </div>
                                <div class="bg-gray-100 text-black rounded-b p-1 w-full truncate">
                                    <div>
                                        <BreezeLabel for="excerpt" value="Track Title" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                                        <input type="text" :id="`title_id${index}`" class="border-0 rounded-full w-1/2" :placeholder="audio_upload['original_name']" />
                                    </div>
                                    <button class="bg-black  text-white rounded-full p-4 mt-2 mb-2" v-if="showUploader == 999" type="button" @click="showUploader = index; openUploader(index)">Change Cover Picture</button>  
                                </div>
                                <div class="min-h-full flex items-center justify-center flex-col mt-2">     
                             
                                        <Uploads v-if="showUploader == index" @close="this.showUploader = 999;" @add_files="processFiles" :user_uploads="user_uploads_images" class="uploader min-h-full min-w-full left-0 top-0 z-10 absolute" />
                                
                                    <div id="selectedFiles"></div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div id="publishButton_Container" style="display:none" class="flex items-center justify-end mt-4">
                    <BreezeButton type="submit" class="ml-4">
                        Publish
                    </BreezeButton>
                </div> 
            </form>
        </div>
      
        <section class="flex flex-row flex-wrap justify-center gap-4 m-14">
            <div v-for="track in music">
                <div class="bg-gray-900 shadow-lg rounded p-3">
                    <div class="group relative">
                        <img class="w-full md:w-72  h-52 block rounded" :src="'/uploads/'+track.image_id" alt="" />
                        <div
                            class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly">
                            <!-- <button
                                class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </button> -->

                            <a :href="'/music/edit/'+ track.id" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                              Edit
                            </a>

                            <button v-on:click="$callMusicPlayer(track.audio_file, track.track_title, track.image_id, 0)" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                            </button>

                            <a :href="'/music/delete/'+ track.id" class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                              Delete
                            </a>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-white text-lg">{{ track.track_title }}</h3>
                        <!-- <p class="text-gray-400">Tycho</p> -->
                    </div>
                </div>
            </div>
        </section>  
    </Dashboard>
</template>

<script>
    export default {
            props: ['user', 'user_uploads_audio', 'selected_uploads', 'user_uploads_images', 'music'],
            data (){
                return {
                    showUploader: 999,
                    current_uploader: 100,
                    uploadsPreview: [],
                    music_uploads: [],
                    error: 'None',
                }
            },
            mounted() {
                 if(sessionStorage.getItem('UPLOADS') == 'OPEN') {
                     this.showUploader = 999;
                 } 
                for (let i = 0; i < 6; i++) {
                    if(document.getElementById(`${i}`)) { 
                        document.getElementById(`${i}`).style.display = 'block'; 
                    }    
                }

                if(document.getElementById(`100`)) { 
                    document.getElementById(`100`).style.display = 'block'; 
                }  
            },
            methods: {
                processFiles(files) {

                    if(this.current_uploader == 100) {
                        this.music_uploads = [];
                        this.selected_music = '';
                        files.forEach(id => {
                            let trackTitle = '';
                            let track = {'track_title': trackTitle, 'audio_id': id, 'image_id': 0};
                            this.music_uploads.push(track);
                        });
                        this.selected_music = files; 
                    } else {
                        this.selected_images = '';
                        files.forEach(file => {
                            this.music_uploads[this.current_uploader]['image_id'] = file;
                            this.user_uploads_images.forEach(upload => {
                                if(upload.id == file) {
                                    document.querySelector('#coverImage' + this.current_uploader).src = `/uploads/${upload.name}`;
                                }
                            });
                        });
                    }

                    if(this.selected_music) {
                        document.querySelector('#publishButton_Container').style.display = 'block';
                    }
                   
                },
                openUploader(index) {  
                    document.querySelector('#tracks').style.display = 'block';
                    for (let i = 0; i < 6; i++) {
                        if(document.getElementById(`${i}`)) { 
                            document.getElementById(`${i}`).style.display = 'none'; 
                        }    
                    }
                    this.current_uploader = parseInt(index);
                    sessionStorage.setItem("UPLOADS", "OPEN");
                },
                publishForm(e) {

                    this.error = 'None';

                    console.log(this.selected_music.length)
                    let length = this.selected_music.length;
                    for (let i = 0; i < length; i++) {
                      
                        let titleInput = document.querySelector('#title_id' + i);
                        if(titleInput) {
                            if(titleInput.value != '') {
                                this.music_uploads[i]['track_title'] = titleInput.value;
                            } else {
                            this.error = ('The input field track title cannot be empty !');
                            }
                        }
                    }
           
                    e.preventDefault();

                    console.log(this.error)

                    if(this.error == 'None') {
                        let currentObj = this;
                        axios.post('/music/create', {
                        uploads: this.music_uploads,
                        })
                        .then(function (response) {
                            document.querySelector('#tracks').style.display = 'none';
                            window.location.href = "/music/create"
                        })
                        .catch(function (error) {
                            currentObj.output = error;
                            console.log(error)
                        });
                    }

                },
            }
        }
    </script>