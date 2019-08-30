function showFormBalas(id) {
	if (document.getElementById(id).style.display === "none") {
		document.getElementById(id).style.display = "block";
	} else {
		document.getElementById(id).style.display = "none";
	}
}

moment.locale('id');
var tanggal = $('#tanggaldatabase').text();
let date = moment(tanggal).utc().format('dddd, D MMMM YYYY H:mm');
$('#tanggalpost').html(date);

// Back to Top
$(document).ready(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {
			$('#back-to-top').fadeIn();
		} else {
			$('#back-to-top').fadeOut();
		}
	});
	// Scroll ke 0px ketika diklik
	$('#back-to-top').click(function () {
		$('#back-to-top').tooltip('hide');
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	$('#back-to-top').tooltip('show');
});

// Search Suggestions
$(document).ready(function () {
	$('#cari').autocomplete({
		source: "artikel/autoSearch/?"
	});
});
