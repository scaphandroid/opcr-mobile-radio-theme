playing = false;

$('#playImg, #pauseImg').click(function(){
    $('#playImg').toggle();
    $('#pauseImg').toggle();
    player = document.getElementById('audioplayer');
    if(!playing){
        player.play();
        playing = true;
    }else{
        player.pause();
        playing = false;
    }
});