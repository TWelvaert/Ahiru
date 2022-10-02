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

                <div v-if="this.success != 'None'" class="ml-2">
                    <b><span class="text-green-800">Success: </span></b><span class="text-green-700"> {{ this.success }}</span>
                </div>

       
                      
                    <div class="flex mt-2">
                        <div class="relative">
                            <img id="coverImage" class="cursor-pointer w-40 h-40 z-0" :src="'/uploads/' + image"/>
                        </div>
                        <div class="bg-gray-100 text-black rounded-b p-1 w-full truncate">
                            <div>
                                <BreezeLabel for="excerpt" value="Track Title" class="block mb-2 uppercase font-bold text-xs text-gray-700 w-full" />
                                <input type="text" id="titleInput" class="border-0 rounded-full w-1/2" :value="music['track_title']" />
                            </div>
                            <button class="bg-black  text-white rounded-full p-4 mt-2 mb-2" v-if="showUploader == 999" type="button" @click="showUploader = index; openUploader(index)">Change Cover Picture</button>  
                        </div>
                        <div class="min-h-full flex items-center justify-center flex-col mt-2">     
                        
                                <Uploads v-if="showUploader == index" @close="this.showUploader = 999;" @add_files="processFiles" :user_uploads="uploads_images" class="uploader min-h-full min-w-full left-0 top-0 z-10 absolute" />
                        
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
            props: ['user', 'selected_uploads', 'uploads_images', 'music', 'image'],
            data (){
                return {
                    showUploader: 999,
                    uploadsPreview: [],
                    error: 'None',
                    success: 'None',
                }
            },
            mounted() {
                this.success = 'None';
            },
            methods: {
                processFiles(files) {
                    let uploadsPreview = [];
                    document.querySelector('#selectedFiles').innerHTML = "";
                    this.selected_files = files;
                    form.uploads = files;

                    this.music.image_id = files[0];
                    
                    this.uploads_images.forEach(upload => {
                        this.selected_files.forEach(file => {
                            if(file == upload.id) {
                                uploadsPreview.push(upload);
                            }  
                        });
                    });

                    uploadsPreview.forEach(upload => {
                        document.querySelector('#coverImage').src = `/${upload.path}/${upload.name}`;
                    });
                },
                openUploader() {  
                    sessionStorage.setItem("UPLOADS", "OPEN");
                },
                publishForm(e) {

                    this.error = 'None';
                    let titleInput = document.querySelector('#titleInput');

                    if(titleInput.value != '') {
                       
                        this.music.track_title = titleInput.value;
                        console.log(this.music)
                    } else {
                    this.error = ('The input field track title cannot be empty !');
                    }
           
                    e.preventDefault();

                    if(this.error == 'None') {
                        let currentObj = this;
                        axios.post(`/music/edit/${this.music.id}`, {
                        track: this.music,
                        })
                        .then(function (response) {
                            
                        })
                        .catch(function (error) {
                            currentObj.output = error;
                            console.log(error)
                        });
                        this.success = 'Your track has been updated!';
                    }

                },
            }
        }
    </script>