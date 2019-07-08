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
