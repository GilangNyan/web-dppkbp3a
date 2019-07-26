// $(document).ready(function () {
// 	$(window).scroll(function () {
// 		if ($(document).scrollTop() > 50) {
// 			$('.navbar').addClass('shrink');
// 			console.log('Shrink ditambahkan');
// 		} else {
// 			$('.navbar').removeClass('shrink');
// 			console.log('Shrink dihapus');
// 		}
// 	});
// });
$(window).scroll(function () {
	var height = $(window).height() / 2;
	$('.navbar').toggleClass('shrink', $(this).scrollTop() > height);
});
