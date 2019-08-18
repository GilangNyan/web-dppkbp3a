// Atur Kepala Dinas
$(document).ready(function () {
	$('#nama').blur(function () {
		var nama = $('#nama').val();
		$.ajax({
			url: 'preferences/editNama',
			method: 'POST',
			dataType: 'text',
			data: {
				nama: nama
			},
			success: function (response) {
				console.log('Nama: ' + nama);
			}
		});
	});
	$('#jabatan').blur(function () {
		var jabatan = $('#jabatan').val();
		$.ajax({
			url: 'preferences/editJabatan',
			method: 'POST',
			dataType: 'text',
			data: {
				jabatan: jabatan
			},
			success: function (response) {
				console.log('Jabatan: ' + jabatan);
			}
		});
	});
});
