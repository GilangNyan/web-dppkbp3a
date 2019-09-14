var flashData = $('.msg').data('flashdata');
if (flashData.includes('berhasil') || flashData.includes('Berhasil')) {
	Swal.fire({
		position: 'top-end',
		type: 'success',
		title: flashData,
		toast: true,
		showConfirmButton: false,
		timer: 3000
	});
} else if (flashData.includes('tidak') || flashData.includes('gagal') || flashData.includes('Kesalahan')) {
	Swal.fire({
		position: 'top-end',
		type: 'error',
		title: flashData,
		toast: true,
		showConfirmButton: false,
		timer: 3000
	});
} else if (flashData.includes('pemulihan')) {
	Swal.fire({
		position: 'top-end',
		type: 'info',
		title: flashData,
		toast: true,
		showConfirmButton: false,
		timer: 3000
	});
}

$(document).ready(function () {
	$('.btn-hapus').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin?',
			text: 'Item yang dihapus tidak bisa dikembalikan!',
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
	});
	$('.btn-hapususer').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin?',
			text: 'User yang dihapus tidak bisa dikembalikan!',
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
	});
	$('.btn-hapuskomentar').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin?',
			text: 'Komentar tersebut tidak bisa dikembalikan!',
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
	});

	$('.btn-hapusalbum').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin album akan dihapus ?',
			text: 'album yang dihapus tidak bisa dikembalikan!',
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
	});
	$('.btn-hapusfoto').click(function (e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			type: 'warning',
			title: 'Apakah anda yakin ingin menghapus foto ini?',
			text: 'album yang dihapus tidak bisa dikembalikan!',
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
	});
});
