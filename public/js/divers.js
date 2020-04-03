player = $('#audio');
let trackUrl = '';
let trackName = '';

$(document).ready(() => {
    player[0].src='';
    $(".track__header").click(function(e) {
        e.preventDefault();
        url = $(this).attr('data-file');
        name = $(this).innerHTML;
        console.log(name);

        player[0].src = url;
        player[0].play();
        console.log(player[0]);
    })
});

function toggleAudio() {
    if(player[0].paused) {
        player[0].play();
    } else {
        player[0].pause();
    }
}

function toggleUserNav() {
    $('.user-nav__navigation').toggleClass("user-nav__navigation--show");
}