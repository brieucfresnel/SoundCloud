player = $('#audio');
let trackUrl = '';
let trackName = '';

$(document).ready(() => {
    $(".track__overlay").click(function(e) {
        e.preventDefault();

        let author = $(this).data('author');
        let track = $(this).data('track');
        let name = track.nom;
        console.log(track.nom);
        
        player[0].src = track.fichier;
        player[0].play();

        $('#playerMainBtnImg').attr('src', '/icons/icon_pause.png');
        $('#currentTrackName').text(name + ' - ' + author);

        // Saving playlist_id
        //let str = $('#addTrackToPlaylist').attr('href').split('/');
        //playlist_id = str[str.length - 2]; 
        //$('#addTrackToPlaylist').attr('href', '/playlist/add/' + playlist_id + "/" + track.id);

        let $trackID = track.id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/setCurrentTrack',
            type: 'POST',
            data: {
                'track': track
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
            }
        })
        $('.playlist-controls__list').load(document.URL +  ' .playlist-controls__list');

    })

    $('.player-controls__playlist-btn').click(() => {
        if( player.attr('src') != undefined ) {
            $('.playlist-controls__menu').toggleClass("playlist-controls__menu--show");
        } 
        
    })
});

function toggleAudio() {
    if(player[0].paused && player.attr('src') != '') {
        player[0].play();
        $('#playerMainBtnImg').attr('src', '/icons/icon_pause.png');
    } else {
        player[0].pause();
        $('#playerMainBtnImg').attr('src', '/icons/icon_play.png');
    }
}

// Toggling audio when pressing spacebar
document.addEventListener('keydown', function(event) {
    if(event.keyCode == 32) {
        toggleAudio();
    }
});

function toggleUserNav() {
    $('.user-nav__navigation').toggleClass("user-nav__navigation--show");
}

$('#track-select-button').click( () => {
    $('#track-input').click();
})

$('#track-img-select-button').click( () => {
    $('#track-img-input').click();
})