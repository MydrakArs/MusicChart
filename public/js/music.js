    var flag = false;
    var audio;
    var player;
    var newplayer;
    var nownum;
    var oldnum;

    const headerplay = document.getElementById('header-play');
    const headerpause = document.getElementById('header-pause');

    const songTitle = document.getElementById('songTitle');
    const songArtist = document.getElementById('songArtist');
    const songImg = document.getElementById('players-img');
    const songSlider = document.getElementById('songSlider');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const volumeSlider = document.getElementById('volumeSlider');
    const playersPause = document.getElementById('players-pause');
    const playersPlay = document.getElementById('players-play');

    function headerPlaySound(sound, number, name) {
        if(!audio) {
            if(!flag) {
                audio = new Audio(sound);
                audio.play();
                audio.volume = volumeSlider.value;
                flag = true;

                headerpause.classList.remove("no-active");
                headerplay.classList.add("no-active");

                playersPlay.classList.add('no-active');
                playersPause.classList.remove('no-active');
                

                console.log("Отработал первый if с false");
                console.log(flag);
                
                return flag;
            } 
            if(flag) {
                audio.pause();
                flag = false;

                headerpause.classList.add("no-active");
                headerplay.classList.remove("no-active");

                playersPlay.classList.remove('no-active');
                playersPause.classList.add('no-active');

                console.log("Отработал первый if с true")
                return flag;
            }
            return audio;
        } else {
                if(flag) {
                    audio.pause();
                    audio.volume = volumeSlider.value;
                    flag = false;

                    headerpause.classList.add("no-active");
                    headerplay.classList.remove("no-active");

                    playersPlay.classList.remove('no-active');
                    playersPause.classList.add('no-active');

                    console.log("Отработал второй if с true")
                    return flag;
                }
                if(!flag) {
                    audio.play();
                    audio.volume = volumeSlider.value;
                    flag = true;

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    console.log("Отработал второй if с false");
                    return [flag, nownum];
                }
        } 
        return audio;
    }   

    function playSound(sound, number, name, artist, img) {
        let play = document.getElementById('playbutton'+ number);
        let pause = document.getElementById('stopbutton'+ number);
        
        player = document.getElementById(number);
        
        const songname = localStorage.setItem('song-name', name);
        const songpath = localStorage.setItem('song-path', sound);
        const songnumber = localStorage.setItem('song-number', number);
        const songartist = localStorage.setItem('song-artist', artist);
        const songimg = localStorage.setItem('song-img', img);
        
        

        if(!audio) {
            if(!flag) {
                audio = new Audio(sound);
                audio.play();
                audio.volume = volumeSlider.value;
                flag = true;
                nownum = number;
                oldnum = number;

                play.classList.add("no-active");
                player.classList.add("active");
                pause.classList.remove("no-active");

                headerpause.classList.remove("no-active");
                headerplay.classList.add("no-active");
                playersPlay.classList.add('no-active');
                playersPause.classList.remove('no-active');

                console.log("Отработал первый if с true");
                document.getElementById('audio-name').innerHTML = name;
                document.getElementById('songTitle').innerHTML = name;
                document.getElementById('songArtist').innerHTML = artist;
                document.getElementById('players-img').src = img;
                return [flag, nownum, oldnum];
            } 
            if(flag) {
                audio.pause();
                flag = false;
                nownum = number;

                oldplay.classList.remove("no-active");
                oldplayer.classList.remove("active");
                oldpause.classList.add("no-active");

                headerpause.classList.add("no-active");
                headerplay.classList.remove("no-active");

                playersPlay.classList.remove('no-active');
                playersPause.classList.add('no-active');

                play.classList.remove("no-active");
                player.classList.remove("active");
                pause.classList.add("no-active");
                console.log("Отработал первый if с false")
                localStorage.setItem('song-name', name);
                document.getElementById('audio-name').innerHTML = name;
                document.getElementById('songTitle').innerHTML = name;
                document.getElementById('songArtist').innerHTML = artist;
                document.getElementById('players-img').src = img;
                return flag;
            }
            return audio;
        } else {

            let oldnewplay = document.getElementById('playbuttonnew'+ oldnum);
            let oldnewpause = document.getElementById('stopbuttonnew'+ oldnum);
            let oldnewplayer = document.getElementById('new'+ oldnum);

            let oldplay = document.getElementById('playbutton'+ oldnum);
            let oldpause = document.getElementById('stopbutton'+ oldnum);
            let oldplayer = document.getElementById(oldnum);

            if(nownum !== number) {
                if(flag) {
                    audio.pause();
                    audio = new Audio(sound);
                    audio.play();
                    audio.volume = volumeSlider.value;
                    flag = true;
                    nownum = number;
                    oldnum = number;

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    console.log("Отработал второй if с true")
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return [flag, nownum];
                }
                if(!flag) {
                    audio = new Audio(sound);
                    audio.play();
                    audio.volume = volumeSlider.value;
                    flag = true;
                    nownum = number;
                    oldnum = number;    

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    console.log("Отработал второй if с false");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return [flag, nownum];
                }
            } else {
                if(!flag) {
                    audio.play();

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    nownum = number;
                    oldnum = number;
                    flag = true;

                    console.log("Отработал else nownum == number с false");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return flag;
                } 
                if(flag) {
                    audio.pause();
                    nownum = number;
                    flag = false;
                    oldnum = number;

                    oldplay.classList.add("no-active");
                    oldplayer.classList.add("active");
                    oldpause.classList.remove("no-active");

                    play.classList.remove("no-active");
                    player.classList.remove("active");
                    pause.classList.add("no-active");

                    headerpause.classList.add("no-active");
                    headerplay.classList.remove("no-active");

                    playersPlay.classList.remove('no-active');
                    playersPause.classList.add('no-active');

                    console.log("Отработал else nownum == number с true");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return flag;
                }
            }
            return audio;
        }
    }
    function playnewSound(sound, number, name, artist, img) {
        let play = document.getElementById('playbuttonnew'+ number);
        let pause = document.getElementById('stopbuttonnew'+ number);
        player = document.getElementById('new'+ number);

        const songname = localStorage.setItem('song-name', name);
        const songpath = localStorage.setItem('song-path', sound);
        const songnumber = localStorage.setItem('song-number', number);
        const songartist = localStorage.setItem('song-artist', artist);
        const songimg = localStorage.setItem('song-img', img);

        if(!audio) {
            if(!flag) {
                audio = new Audio(sound);
                audio.play();
                audio.volume = 0.01;
                flag = true;
                nownum = number;
                oldnum = number;
                play.classList.add("no-active");
                player.classList.add("active");
                pause.classList.remove("no-active");

                headerpause.classList.remove("no-active");
                headerplay.classList.add("no-active");

                playersPlay.classList.add('no-active');
                playersPause.classList.remove('no-active');

                console.log("Отработал первый if с true");
                localStorage.setItem('song-name', name);
                document.getElementById('audio-name').innerHTML = name;
                document.getElementById('songTitle').innerHTML = name;
                document.getElementById('songArtist').innerHTML = artist;
                document.getElementById('players-img').src = img;
                return [flag, nownum, oldnum];
            } 
            if(flag) {
                audio.pause();
                flag = false;
                nownum = number;

                oldplay.classList.remove("no-active");
                oldplayer.classList.remove("active");
                oldpause.classList.add("no-active");

                oldnewplay.classList.add("no-active");
                oldnewplayer.classList.add("active");
                oldnewpause.classList.remove("no-active");

                headerpause.classList.add("no-active");
                headerplay.classList.remove("no-active");
                
                playersPlay.classList.remove('no-active');
                playersPause.classList.add('no-active');

                play.classList.remove("no-active");
                player.classList.remove("active");
                pause.classList.add("no-active");
                console.log("Отработал первый if с false");
                localStorage.setItem('song-name', name);
                document.getElementById('audio-name').innerHTML = name;
                document.getElementById('songTitle').innerHTML = name;
                document.getElementById('songArtist').innerHTML = artist;
                document.getElementById('players-img').src = img;
                return flag;
            }
            return audio;
        } else {

            let oldnewplay = document.getElementById('playbuttonnew'+ oldnum);
            let oldnewpause = document.getElementById('stopbuttonnew'+ oldnum);
            let oldnewplayer = document.getElementById('new'+ oldnum);

            let oldplay = document.getElementById('playbutton'+ oldnum);
            let oldpause = document.getElementById('stopbutton'+ oldnum);
            let oldplayer = document.getElementById(oldnum);

            if(nownum !== number) {
                if(flag) {
                    audio.pause();
                    audio = new Audio(sound);
                    audio.play();
                    audio.volume = 0.01;
                    flag = true;
                    nownum = number;
                    oldnum = number;
                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    console.log("Отработал второй if с true");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return [flag, nownum];
                }
                if(!flag) {
                    audio = new Audio(sound);
                    audio.play();
                    audio.volume = 0.01;
                    flag = true;
                    nownum = number;
                    oldnum = number;    

                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");
                    console.log("Отработал второй if с false");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return [flag, nownum];
                }
            } else {
                if(!flag) {
                    audio.play();

                    oldnewplay.classList.remove("no-active");
                    oldnewplayer.classList.remove("active");
                    oldnewpause.classList.add("no-active");

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    play.classList.add("no-active");
                    player.classList.add("active");
                    pause.classList.remove("no-active");

                    headerpause.classList.remove("no-active");
                    headerplay.classList.add("no-active");

                    playersPlay.classList.add('no-active');
                    playersPause.classList.remove('no-active');

                    nownum = number;
                    oldnum = number;
                    flag = true;

                    console.log("Отработал else nownum == number с false");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return flag;
                } 
                if(flag) {
                    audio.pause();
                    nownum = number;
                    flag = false;
                    oldnum = number;

                    oldnewplay.classList.add("no-active");
                    oldnewplayer.classList.add("active");
                    oldnewpause.classList.remove("no-active");

                    oldplay.classList.remove("no-active");
                    oldplayer.classList.remove("active");
                    oldpause.classList.add("no-active");

                    play.classList.remove("no-active");
                    player.classList.remove("active");
                    pause.classList.add("no-active");

                    headerpause.classList.add("no-active");
                    headerplay.classList.remove("no-active");

                    playersPlay.classList.remove('no-active');
                    playersPause.classList.add('no-active');

                    console.log("Отработал else nownum == number с true");
                    localStorage.setItem('song-name', name);
                    document.getElementById('audio-name').innerHTML = name;
                    document.getElementById('songTitle').innerHTML = name;
                    document.getElementById('songArtist').innerHTML = artist;
                    document.getElementById('players-img').src = img;
                    return flag;
                }
            }
            return audio;
        }
    }

    let flagHeader = false;
    const header = document.getElementById('full-header');

    function openHeader() {
        if(!flagHeader) {
            console.log(header);
            header.classList.add("active");
            flagHeader = true;
            return flagHeader
        } else {
            header.classList.remove("active");
            flagHeader = false;
            return flagHeader
        }
    }


    let currentSong = 0;
    
    audio = new Audio();

    window.onload = loadSong;

    function loadSong() {
        audio.src = localStorage.getItem('song-path');
        audio.volume = volumeSlider.value;
        audio.pause();
        audio.playbackRate = 1;
        setTimeout(showDuration, 1000);
    }
    

    setInterval(updateSongSlider, 1000);


    function updateSongSlider() {
        if(audio.currentTime !== 0) {
            let c = Math.round(audio.currentTime);
            songSlider.value = c;
            currentTime.textContent = convertTime(c);
            duration.classList.add("no-active");
            if(audio.ended) {
                audio.pause()
                playersPlay.classList.remove('no-active');
                playersPause.classList.add('no-active');

                headerpause.classList.add("no-active");
                headerplay.classList.remove("no-active");
            }
        }
        
    }

    function convertTime(secs) {
        let min = Math.floor(secs/60);
        let sec = secs % 60;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;
        
        return (min + ":" + sec);
    }

    function showDuration() {
        let d = Math.floor(audio.duration);
        songSlider.setAttribute("max", d);
        duration.textContent = convertTime(d);
    }

    function playOrPauseSong(sound, number, name, artist, img) {
        audio.playbackRate = 1;
        
        let songname;
        let songpath;
        let songnumber;
        let songartist;
        let songimg ;

        let ids = localStorage.getItem('song-number');
        document.getElementById('songTitle').innerHTML = name;
        document.getElementById('songArtist').innerHTML = artist;
        document.getElementById('players-img').src = img;
        document.getElementById('audio-name').innerHTML = name;

        let backnum = localStorage.getItem('song-number');
        let background = document.getElementById('header-song' + number);
        let preback = document.getElementById('header-song' + backnum);
        
        if(ids == number) {
            if(audio.paused) {
                audio.play();
                playersPlay.classList.add('no-active');
                playersPause.classList.remove('no-active');
                songname = localStorage.setItem('song-name', name);
                songpath = localStorage.setItem('song-path', sound);
                songnumber = localStorage.setItem('song-number', number);
                songartist = localStorage.setItem('song-artist', artist);
                songimg = localStorage.setItem('song-img', img);

                headerpause.classList.remove("no-active");
                headerplay.classList.add("no-active");

                if(!background.classList.contains('background-color')) {
                    background.classList.add('background-color');
                }

            } else {
                audio.pause()
                playersPlay.classList.remove('no-active');
                playersPause.classList.add('no-active');
                songname = localStorage.setItem('song-name', name);
                songpath = localStorage.setItem('song-path', sound);
                songnumber = localStorage.setItem('song-number', number);
                songartist = localStorage.setItem('song-artist', artist);
                songimg = localStorage.setItem('song-img', img);

                headerpause.classList.add("no-active");
                headerplay.classList.remove("no-active");

                nownum = number;
                oldnum = ids;

                return [nownum, oldnum];
            }
        } if(ids !== number) {
            
            audio.pause();
            playersPlay.classList.add('no-active');
            playersPause.classList.remove('no-active');
            audio = new Audio();
            songname = localStorage.setItem('song-name', name);
            songpath = localStorage.setItem('song-path', sound);
            songnumber = localStorage.setItem('song-number', number);
            songartist = localStorage.setItem('song-artist', artist);
            songimg = localStorage.setItem('song-img', img);

            audio.src = localStorage.getItem('song-path');
            audio.play()
            localStorage.setItem('song-name', name);

            headerpause.classList.remove("no-active");
            headerplay.classList.add("no-active");

            if(preback.classList.contains('background-color')) {
                preback.classList.remove('background-color');
                background.classList.add('background-color');
            } else {
                
            }

            // background.classList.remove('background-color');
            // newbackground.classList.add('background-color');
        }
    }

    function playOrPause() {
        if(audio.paused) {
            audio.play();
            playersPlay.classList.add('no-active');
            playersPause.classList.remove('no-active');

            headerpause.classList.remove("no-active");
            headerplay.classList.add("no-active");
        } else {
            audio.pause()
            playersPlay.classList.remove('no-active');
            playersPause.classList.add('no-active');

            headerpause.classList.add("no-active");
            headerplay.classList.remove("no-active");
        }
    }

    function next() {

    }

    function seekSong() {
        audio.currentTime = songSlider.value;
        console.log(songSlider.value);
        
        currentTime.textContent = convertTime(audio.currentTime);
    }

    function adjustVolume() {
        audio.volume = volumeSlider.value;
    }

    function increasePlaybackRate() {
        audio.playbackRate += 0.5;
    }

    function decreasePlaybackRate() {
        audio.playbackRate -= 0.5;
    }