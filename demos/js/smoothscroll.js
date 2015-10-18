/* smooth scrolling hack */
$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash;
	    var $target = $(target);
	    $('.parallax').stop().animate({ 'scrollTop': $target.position().top}, 2000, 'swing');
	});

});
