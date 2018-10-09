jQuery(document).ready(function($) {
	var player = {
        play  : $('#play'),
        stop  : $('#stop'),
        vol :   $('.volume input'),
    }

    song 	= new Audio();
	song.type= 'audio/mpeg';

    control_player(song, player);

	songDetail = {
		'tenbaihat' : 'Easy Love',
		'trinhbay'  : 'Sigala',
		'link'      : 'https://bot-ex.org/nhac.mp3'
	}

	$('h3.tenbaihat').text(songDetail.tenbaihat);
	$('h4.trinhbay').text(songDetail.trinhbay);

	song.src = songDetail.link;
	song.volume = player.vol.val()/100;
	song.play();

	song.addEventListener('timeupdate',function (){
        per = (song.currentTime/song.duration)*100;

        if(per == 100){
            $('.fill').css({'width': '0%'});
            $('#seek').attr('value',0);
            song.play();
        }else{
            $('.fill').css({'width': per + '%'});
            $('#seek').attr('value', per);
        }
    });

    $('#seek').click(function(event) {
	    time = ($(this).val()/100)*song.duration;
	    song.currentTime = time;
	});
});