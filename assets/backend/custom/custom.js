$(document).ready(function(){
	$('.main-search').hide();
	$('.srch button').click(function (){
		$('.main-search').show();
		$('.main-search text').focus();
	});
	$('.close').click(function(){
		$('.main-search').hide();
	});
});