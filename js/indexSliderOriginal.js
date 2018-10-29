$(document).ready(function () {
	var divWidth = $('#indexMeal-slider').width();
	var imgCount = $('#indexMeal-box li').length;
	$('#indexMeal-box li').width(divWidth);
	$('#indexMeal-box').width(divWidth * imgCount);

	for (var i = 0; i < imgCount; i++) {
		$('#indexMeal-boxBtn').append('<li></li>');
	}
	$('#indexMeal-boxBtn li:nth-child(1)').addClass('clickMe');

	$('#indexMeal-boxBtn li').click(function () {
		var index = $(this).index();

		$('#indexMeal-box').animate({
			left: divWidth * index * -1
		});

		$(this).addClass('clickMe');
		$('#indexMeal-boxBtn li').not(this).removeClass('clickMe')
	});
});