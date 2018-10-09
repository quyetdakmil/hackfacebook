function control_player(song,ctrl) {
	ctrl.play.on('click', function(e) {
		e.preventDefault();
		status = $(this).find('i').hasClass('icon-pause') ? 'play' : 'pause';

		if(status == 'play'){
			$(this).changeClass('icon-pause','icon-play');
			song.pause();
		}else{
			$(this).changeClass('icon-play','icon-pause');
			song.play();
		}
	});

	ctrl.stop.on('click', function(e) {
		e.preventDefault();
		ctrl.play.changeClass('icon-pause','icon-play');
		song.pause(); song.currentTime = 0;
	});

	ctrl.vol.change(function(e) {
		song.volume = ($(this).val())/100;
		$('#vol-fill').css('width', $(this).val() + '%');
	});
}

$.fn.changeClass = function(before, after) {
	$(this).find('i').removeClass(before).addClass(after);
}