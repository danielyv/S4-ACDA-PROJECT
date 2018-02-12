$(document).ready(function(){
  $('.spoiler-toggle').removeClass('hide-icon');
  $('.spoiler-toggle').addClass('show-icon');
});


$(function() {
	$('div.spoiler-title').click(function() {
		$(this)
			.children()
			.first()
			.toggleClass('show-icon')
			.toggleClass('hide-icon');
		$(this)
			.parent().children().last().toggle();
	});
});
