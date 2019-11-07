// Atur Kepala Dinas
$(document).ready(function () {
	$('#btnKepala').click(function () {
		var nama = $('#namakadis').val();
		var jabatan = $('#jabatan').val();
		console.log(nama);
		$.ajax({
			url: 'preferences/editNama',
			method: 'POST',
			dataType: 'text',
			data: {
				nama: nama,
				jabatan: jabatan
			},
			success: function (response) {
				Swal.fire({
					position: 'top-end',
					type: 'success',
					title: 'Data Kepala Dinas berhasil diubah',
					toast: true,
					showConfirmButton: false,
					timer: 3000
				});
			}
		});
	})

	$('#btnfoto').click(function () {
		$('#foto').click();
	});

	$('#foto').change(function () {
		var files = $('#foto').prop('files')[0];
		var formdata = new FormData();
		formdata.append('foto', files);
		$.ajax({
			url: 'preferences/updateFoto',
			method: 'POST',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: formdata,
			success: function (response) {
				Swal.fire({
					position: 'top-end',
					type: 'success',
					title: 'Foto Kepala Dinas berhasil diubah',
					toast: true,
					showConfirmButton: false,
					timer: 3000
				});
				$("#divfoto").load(" #divfoto > *");
			},
			error: function (response) {
				Swal.fire({
					position: 'top-end',
					type: 'error',
					title: 'Foto Kepala Dinas gagal diubah',
					toast: true,
					showConfirmButton: false,
					timer: 3000
				});
			}
		});
	});

	$('#provinsi').on('change', function () {
		var selectedProv = $(this).find('option:selected').val();
		console.log(selectedProv);
		$.ajax({
			url: 'preferences/getKabupaten',
			type: 'POST',
			data: {
				idprov: selectedProv
			},
			success: function (res) {
				console.log('Berhasil mendapatkan data kabupaten');
				$('#kabupaten').html(res);
			},
			error: function (xhr, status, error) {
				console.log(error);
			}
		});
	});

	$('#kabupaten').on('change', function () {
		var selectedKab = $(this).find('option:selected').val();
		console.log(selectedKab);
		$.ajax({
			url: 'preferences/getKecamatan',
			type: 'POST',
			data: {
				idkab: selectedKab
			},
			success: function (res) {
				console.log('Berhasil mendapatkan data kecamatan');
				$('#kecamatan').html(res);
			},
			error: function (xhr, status, error) {
				console.log(error);
			}
		});
	});

	$('#kecamatan').on('change', function () {
		var selectedKec = $(this).find('option:selected').val();
		console.log(selectedKec);
		$.ajax({
			url: 'preferences/getDesa',
			type: 'POST',
			data: {
				idkec: selectedKec
			},
			success: function (res) {
				console.log('Berhasil mendapatkan data desa');
				$('#desa').html(res);
			},
			error: function (xhr, status, error) {
				console.log(error);
			}
		});
	});

	// Upload Progress Bar
	$('#uploadvideo').on('submit', function (event) {
		$('.progress').show();
		var formaction = (this).attr('action');
		var formdata = $(this).serialize();
		$.ajax({
			xhr: function () {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener('progress', function (e) {
					if (e.lengthComputable) {
						var percent = Math.round((e.loaded / e.total) * 100);
						$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
						if (e.loaded == e.total) {
							$('.progress').hide();
						}
					}
				}, false);
			},
			type: 'POST',
			url: formaction,
			data: formdata,
			success: function (response, error) {
				console.log(error);
			}
		});
	});
});

$(function () {
	$('.select2').select2();
});

$(document).ready(function () {
	$("#telepon").inputmask("(9999) 999999", {
		removeMaskOnSubmit: true
	});
	$("#postal").inputmask("99999");
});

$(document).on('lity:ready', function (event, lightbox) {
	$(event.currentTarget.activeElement).find('.lity-content').prepend('<h2>' + lightbox.opener().data('title') + '</h2>');
});

$('#upload').on('change', function () {
	var filename = $(this).val().replace('C:\\fakepath\\', "");

	$(this).next('.custom-file-label').html(filename);
});

$('#gambar').on('change', function () {
	var filename = $(this).val().replace('C:\\fakepath\\', "");

	$(this).next('.custom-file-label').html(filename);
});

$('#fotoprofil').on('change', function () {
	var filename = $(this).val().replace('C:\\fakepath\\', "");

	$(this).next('.custom-file-label').html(filename);
});
