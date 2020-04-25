player = $('#audio');
let trackUrl = '';
let trackName = '';

$(document).ready(() => {
    player[0].src='';
    $(".track__overlay").click(function(e) {
        e.preventDefault();
        url = $(this).attr('data-file');
        name = $(this).attr('data-name');
        author = $(this).attr('data-author');

        player[0].src = url;
        player[0].play();

        $('#playerMainBtnImg').attr('src', '/icons/icon_pause.png');
        $('#currentTrackName').text(name + ' - ' + author);
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

function toggleUserNav() {
    $('.user-nav__navigation').toggleClass("user-nav__navigation--show");
}

$('#track-select-button').click( () => {
    $('#track-input').click();
})

$('#track-img-select-button').click( () => {
    $('#track-img-input').click();
})