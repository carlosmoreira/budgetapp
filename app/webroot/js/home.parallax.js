$('document').ready(function(){
		$(window).scroll(function(event) {
			var offset = window.pageYOffset; 
			$('#parallex_con').css('top', (offset * -1 ) + 'px');
		});
});



