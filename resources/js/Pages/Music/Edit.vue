<script setup>

    import Dashboard from '@/Pages/Dashboard.vue';
    import Uploads from "@/Plugins/Uploads.vue";
    import BreezeButton from "@/Components/Button.vue";
    import BreezeLabel from "@/Components/Label.vue";

</script>

<template>
    <Dashboard>
        <div class="flex items-center justify-center flex-col min-w-full relative">
            <!-- <span class="text-center bg-black text-white w-full py-4">
                Welcome to the Music Manager !<br>
                Via this tool you can release and manage your music on our platform.<br><br>

                You can open the uploader/file selector by clicking the button below.
            </span> -->
          

        </div>

        <div id="tracks" class="relative">
            <form @submit="publishForm">

                <div v-if="this.error != 'None'" class="ml-2">
                    <b><span class="text-red-800">ERROR: </span></b><span class="text-red-700"> {{ this.error }}</span>
                </div>

       
                      
                    <div class="flex mt-2">
                        <div class="relative">
                            <img  class="cursor-pointer w-40 h-40 z-0" :src="'/uploads/' + music['image_id']"/>
                        </div>
                        <div class="bg-gray-100 text-black rounded-b p-1 w-full truncate">
                            <div>
                                <BreezeLabel for="excerpt" value="Track Title" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                                <input type="text" :id="`title_id${index}`" class="border-0 rounded-full w-1/2" :value="music['track_title']" />
                            </div>
                            <button class="bg-black  text-white rounded-full p-4 mt-2 mb-2" v-if="showUploader == 999" type="button" @click="showUploader = index; openUploader(index)">Change Cover Picture</button>  
                        </div>
                        <div class="min-h-full flex items-center justify-center flex-col mt-2">     
                        
                                <Uploads v-if="showUploader == index" @close="this.showUploader = 999;" @add_files="processFiles" :user_uploads="user_uploads_images" class="uploader min-h-full min-w-full left-0 top-0 z-10 absolute" />
                        
                            <div id="selectedFiles"></div>
                        </div>
               

                </div>
                <div id="publishButton_Container" class="flex items-center mt-4">
                    <BreezeButton type="submit" class="ml-4">
                        Edit
                    </BreezeButton>
                </div> 
            </form>
        </div>
       
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