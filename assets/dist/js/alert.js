var flashData = $('.msg').data('flashdata');
if (flashData.includes('berhasil') || flashData.includes('Berhasil')) {
	Swal.fire({
		type: 'success',
		title: 'Pesan',
		text: flashData
	});
} else if (flashData.includes('tidak')) {
	Swal.fire({
		type: 'error',
		title: 'Pesan',
		text: flashData
	});
}

$(document).ready(function () {
	$('.btn-hapus').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin?',
			text: 'Post yang dihapus tidak bisa dikembalikan!',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus',
			cancelButtonText: "Batal"
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	})
})
