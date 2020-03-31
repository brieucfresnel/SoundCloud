$(document).ready(() => {
    $(".track__header").click(function(e) {
        e.preventDefault();
        let url = $(this).attr('data-file');

        player = $('#audio');
        player[0].src = url;
        player[0].play();
    })
});

var sound = new Howl({
  src: ['sound.mp3']
});

sound.play();
console.log(sound);