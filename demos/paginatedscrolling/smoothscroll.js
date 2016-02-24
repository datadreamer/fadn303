/* smooth scrolling hack */
$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash;
	    var $target = $(target);
	    $('body').stop().animate({ 'scrollTop': $target.offset().top}, 2000, 'swing');
	});

});
