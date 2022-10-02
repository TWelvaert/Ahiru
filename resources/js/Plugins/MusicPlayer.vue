
<template>
<div id="musicPlayer">	
	<div class="relative bottom-0 w-player flex flex-col">

		<div id="hide" class="px-10 pt-10 pb-4 flex items-center z-10">
			<div class="flex">
                <img :src="''" id="songCover" class="w-12 h-12 rounded-md mr-6 border items-center "/>
				<span id="songTitle" class="font-sans text-lg font-medium leading-7 text-slate-900 dark:text-white"></span>
			</div>

			<div class="text-black mx-10">
				<span class="mtb-2" name="min" @click="min">min</span>
			    <input class="mx-2" type="range" orient="vertical" id="volume-slider" min="0" max="100" step="1" v-model="volume" @input="$updateMusicPlayerVolume()">
			    <span class="ml-1" name="max" @click="max">max</span>
			</div>
		</div>

		<div class="w-full flex px-10 z-50">
            <div id="musicPlayer_pauseButton" >
					<svg @click="$pauseMusicPlayer()" class="bg-black rounded-full p-1  mr-2" width="24" height="24" viewBox="0 0 24 36" fill="" xmlns="http://www.w3.org/2000/svg">
						<rect width="6" height="36" rx="3" class="fill-slate-100 dark:fill-slate-100"/>
						<rect x="18" width="6" height="36" rx="3" class="fill-slate-100 dark:fill-slate-100" />
					</svg>	
				</div>
				<div id="musicPlayer_playButton">
					<svg @click="$playMusicPlayer()"  class="bg-black rounded-full p-1 mr-2" width="24" height="24" viewBox="0 0 31 37" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M29.6901 16.6608L4.00209 0.747111C2.12875 -0.476923 0.599998 0.421814 0.599998 2.75545V33.643C0.599998 35.9728 2.12747 36.8805 4.00209 35.6514L29.6901 19.7402C29.6901 19.7402 30.6043 19.0973 30.6043 18.2012C30.6043 17.3024 29.6901 16.6608 29.6901 16.6608Z" class="fill-slate-100 dark:fill-slate-100"/>
					</svg>	
				</div>
            <span id="songTime1" class="font-sans text-sm mr-1 font-medium leading-6 text-gray-500 dark:text-gray-400"></span>
			<input type="range" class="w-full" id="song-slider" step=".1"  @input="$updateMusicPlayerTime()"/>
            <span id="songTime2" class="font-sans ml-1 text-sm font-medium leading-6 text-gray-500 dark:text-gray-400"></span>
		</div>

		<div class="px-30 rounded-b-xl  flex items-center justify-around z-50 ">
			<div class="cursor-pointer w-15 h-10  border-play-pause-light-border shadow-xl flex items-center justify-center ">
	
			</div>
		</div>  

    </div>
</div>

</template>

<script>
    import { inject } from 'vue';
export default {
    inject:['playMusic'],
    data (){
            return {
                volume: Number,
                isShuffle: Boolean,
            }
    },
    mounted() {

        // if(sessionStorage.getItem("MUSIC_PLAYER") == "OPEN") {
        //     document.querySelector('#musicPlayer').style.display = 'block';

        //     document.querySelector('#musicPlayer_pauseButton').style.display = 'block';
        //     document.querySelector('#musicPlayer_playButton').style.display = 'none'; 

        //     let fileName = sessionStorage.getItem("MUSIC_PLAYER_SRC");
        //     let track_title = sessionStorage.getItem("MUSIC_PLAYER_TITLE");
        //     let track_img = sessionStorage.getItem("MUSIC_PLAYER_IMG");
        //     let startTime = sessionStorage.getItem("MUSIC_PLAYER_TIME");
        //     this.playMusic(fileName, track_title, track_img, startTime)
        // }
            
       
   
    },
    install: (app, options) => {

        let isPlaying = false;
        let audio;
        let progressBar;
        let currentTimeTxt;
        let currentDurationTxt;
        let currentTime = 0;


    app.config.globalProperties.$callMusicPlayer = (fileName, track_title, track_img, currentTime) => 
    {
        playMusic(fileName, track_title, track_img, currentTime);
    }

    function playMusic(fileName, track_title, track_img, currentTime) 
    {
        


        if(audio) {
            audio.src = null;
        }

        let path = `/uploads/${fileName}`;
        console.log(`Audio playing: ${path}`);

        let requestObj = new Request(path, {
            method: 'GET',
            headers: {
              'Accept-Ranges': '1000000000'
            },
            referrerPolicy: 'no-referrer'
        });

        fetch(requestObj).then(function(response) {
          return response;
        }).then(async function(outcome) {
          const blob = await outcome.blob();
          const url = window.URL.createObjectURL(blob); 
          path = url; 
          console.log(blob);
          console.log(path);
        });

        let songs = [
          {
            title: track_title,
            src: path,
            img: track_img,
            startTime: currentTime,
          }
        ];

        sessionStorage.setItem("MUSIC_PLAYER", "OPEN");

          

        let currentDuration = 0;
        currentTimeTxt = '0:00';
        currentDurationTxt ='0:00';
        let currentSong = songs[0];
        let audio_source = currentSong.src;
    
        progressBar = document.querySelector("#song-slider")
        progressBar.value = 0;
        audio = new Audio(audio_source);

        initProgress()
        audio.play()

        sessionStorage.setItem("MUSIC_PLAYER_TITLE", currentSong.title);
        sessionStorage.setItem("MUSIC_PLAYER_IMG", currentSong.img);
        sessionStorage.setItem("MUSIC_PLAYER_SRC", currentSong.src);
        sessionStorage.setItem("MUSIC_PLAYER_TIME", audio.currentTime);

        document.querySelector('#musicPlayer').style.display = 'block';
        document.querySelector('#songTitle').innerHTML = track_title;
        document.querySelector('#songCover').src = '/uploads/'+currentSong.img;
        document.querySelector('#musicPlayer_pauseButton').style.display = 'block';
        document.querySelector('#musicPlayer_playButton').style.display = 'none';

        isPlaying = true
      
        function initProgress() {
          audio.addEventListener('loadedmetadata', () => {
            currentDuration = audio.duration
            let secs = `${parseInt(`${currentDuration % 60}`, 10)}`.padStart(2,'0')
            let mins = parseInt(`${(currentDuration/60) % 60}`, 10)
            currentDurationTxt = `${mins}:${secs}`
            progressBar.max = currentDuration
          })
          audio.addEventListener('timeupdate', () => {
            updateProgress(audio.currentTime)
            progressBar.value = audio.currentTime;
          })
        }
      }

      function updateProgress(time)
      {
        let secs = `${parseInt(`${time % 60}`, 10)}`.padStart(2,'0');
        let mins = parseInt(`${(time/60) % 60}`, 10);
        currentTimeTxt = `${mins}:${secs}`;
        document.querySelector('#songTime1').innerHTML = `${currentTimeTxt}`;
        document.querySelector('#songTime2').innerHTML = `${currentDurationTxt}`;
      }


      app.config.globalProperties.$playMusicPlayer = () => 
      {
        audio.play();
        isPlaying = true
        document.querySelector('#musicPlayer_pauseButton').style.display = 'block';
        document.querySelector('#musicPlayer_playButton').style.display = 'none';
      } 

      app.config.globalProperties.$pauseMusicPlayer = () => 
      {
        document.querySelector('#musicPlayer_pauseButton').style.display = 'none';
        document.querySelector('#musicPlayer_playButton').style.display = 'block';
        audio.pause()
        isPlaying = false
      } 

      app.config.globalProperties.$repeatMusicPlayer = () => 
      {
        if(audio.loop == false) {
          audio.loop = true;
        } else {
          audio.loop = false;
        }
      } 
      app.config.globalProperties.$updateMusicPlayerTime = () => 
      {
        updateProgress(progressBar.value)
        audio.currentTime = progressBar.value;
      } 

      app.config.globalProperties.$updateMusicPlayerVolume = () => 
      {
        let inputVolume = document.querySelector('#volume-slider').value;
        audio.volume = inputVolume/100
      } 

      app.config.globalProperties.$playMusic = playMusic;
      
      app.provide("playMusic", playMusic);  
     // app.provide('musicPlayerPlugin', options)
      
    }
  }
</script>