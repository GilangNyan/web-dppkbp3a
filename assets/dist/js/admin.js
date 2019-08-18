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
				Swal.fire({
					position: 'top-end',
					type: 'success',
					title: 'Nama Kepala Dinas berhasil diubah',
					toast: true,
					showConfirmButton: false,
					timer: 3000
				});
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
				Swal.fire({
					position: 'top-end',
					type: 'success',
					title: 'Jabatan Kepala Dinas berhasil diubah',
					toast: true,
					showConfirmButton: false,
					timer: 3000
				});
			}
		});
	});
});
