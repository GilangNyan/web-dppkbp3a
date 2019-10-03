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

// Live Search
// $(document).ready(function () {
// 	var cariurl = $("#formsearch").attr("action");
// 	console.log(cariurl);
// });
$('#cari').on('keyup', function () {
	var cari = $('#cari').val();
	if (cari == '') {
		$('#searchData').empty();
	} else {
		$.ajax({
			url: window.location.origin + '/web-dppkbp3a/blog/artikel/liveSearch', // 'blog/artikel/liveSearch'
			type: 'POST',
			data: {
				searchval: cari
			},
			success: function (res) {
				$('#searchData').html(res);
			}
		})
	}
});

// Post Pesan
$(document).ready(function () {
	$('#formpesan').validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			pesan: {
				required: true
			}
		},
		submitHandler: function (form) {
			// form.submit();
			$.ajax({
				url: form.action,
				type: form.method,
				data: $(form).serialize(),
				success: function (response) {
					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Pesan berhasil dikirim',
						toast: true,
						showConfirmButton: false,
						timer: 3000
					});
					$('#formpesan').each(function () {
						this.reset();
					});
				},
				error: function (error) {
					console.log('Error: ' + error);
					Swal.fire({
						position: 'top-end',
						type: 'error',
						title: 'Pesan gagal dikirim karena kesalahan',
						toast: true,
						showConfirmButton: false,
						timer: 3000
					});
					$('#formpesan').each(function () {
						this.reset();
					});
				}
			})
		}
	});
});
