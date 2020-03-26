$(document).ready(() => {
    $(".track").click(function(e) {
        e.preventDefault();
        let url = $(this).attr('data-file');

        player = $('#audio-player');
        player[0].src = url;
        player[0].play();
    })
});
