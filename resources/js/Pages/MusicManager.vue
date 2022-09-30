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
                Via this tool you can upload and publish your latest music on our platform.
            </span>
          
            <div class="min-h-full flex items-center justify-center flex-col min-w-full relative mt-2">
                <BreezeButton v-if="!showUploader" type="button" @click="showUploader = true; openUploader('100')">Click Here to open the uploader</BreezeButton> 
                <div id="100" style="display:none" >
                    <Uploads class="uploader min-h-full min-w-full left-0 top-0 z-10 absolute" v-if="showUploader"  @close="this.showUploader = false;" @add_files="processFiles" :user_uploads="user_uploads_audio" />
                 </div>
                <div id="selectedFiles"></div>
            </div>
        </div>

        <div id="tracks" class="relative">
            <form @submit="publishForm">
                <div v-for="upload in this.user_uploads_audio" > 
                    <div v-for="(file, index) in selected_music" :key="index"> 
                        <div v-if="file == upload.id"> 
                            <div class="flex mt-2">
                                <div class="relative">
                                    <img  class="cursor-pointer w-40 h-40 z-0" src="/assets/img/play_audio.png"/>
                                </div>
                                <div class="bg-gray-100 text-black rounded-b p-1 w-full truncate">
                                    <div>
                                        <BreezeLabel for="excerpt" value="Track Title" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                                        <input type="text" :id="`title_id${index}`" class="border-0 rounded-full w-1/2" :placeholder="upload['original_name']" />
                                    </div>
                                    <button class="bg-black  text-white rounded-full p-4 mt-2 mb-2" v-if="!showUploader" type="button" @click="showUploader = true; openUploader(index)">Change Cover Picture</button>  
                                </div>
                                <div class="min-h-full flex items-center justify-center flex-col mt-2">     
                                    <div :id="index" style="display:none">
                                        <Uploads class=" uploader min-h-full min-w-full absolute w-full left-0 top-0 z-10" v-if="showUploader" @close="this.showUploader = false;" @add_files="processFiles" :user_uploads="user_uploads_images" :index="index" />
                                    </div>
                                    <div id="selectedFiles"></div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="flex items-center justify-end mt-4">
                    <BreezeButton type="submit" class="ml-4">
                        Publish
                    </BreezeButton>
                </div> 
            </form>
        </div>
      
    </Dashboard>

</template>



<script>

    export default {
            props: ['user_uploads_audio', 'selected_uploads', 'user_uploads_images'],
            data (){
                return {
                    showUploader: false,
                    current_uploader: 100,
                    uploadsPreview: [],
                    uploads: [],
                    test: 'xx',
                    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            },
            mounted() {
                 if(sessionStorage.getItem('UPLOADS') == 'OPEN') {
                     this.showUploader = true;
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
                        this.uploads = [];
                        this.selected_music = '';
                        files.forEach(id => {

                            let trackTitle = '';
                            
                            let track = {'track_title': trackTitle, 'audio_id': id, 'image_id': 0};
                            this.uploads.push(track);
                        });
                        this.selected_music = files; 
                    } else {
                        this.selected_images = '';
                        files.forEach(file => {
                            this.uploads[this.current_uploader]['image_id'] = file;
                        });
                    }
                   
                   
                },
                openUploader(index) {  
                    document.querySelector('#tracks').style.display = 'block';
                    for (let i = 0; i < 6; i++) {
                        if(document.getElementById(`${i}`)) { 
                            document.getElementById(`${i}`).style.display = 'none'; 
                        }    
                    }

                    if(document.getElementById(`100`)) { 
                        document.getElementById(`100`).style.display = 'none'; 
                    }   

                    this.current_uploader = parseInt(index);
                    console.log(this.current_uploader);

                    document.getElementById(`${index}`).style.display  = 'block';
                    sessionStorage.setItem("UPLOADS", "OPEN");
                },
                publishForm(e) {

                    for (let i = 0; i < 6; i++) {
                        let titleInput = document.querySelector('#title_id' + i);
                        if(titleInput) {
                            this.uploads[i]['track_title'] = titleInput.value;
                        }
                    }
           
                    e.preventDefault();
                    let currentObj = this;
                    axios.post('/music/create', {
                       uploads: this.uploads,
                    })
                    .then(function (response) {
                        document.querySelector('#tracks').style.display = 'none';
                      //  window.location.href = "/music"
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                        console.log(error)
                    });
                },
            }
        }
    </script>