// Atur Kepala Dinas
$(document).ready(function () {
	$('#namakadis').blur(function () {
		var nama = $('#namakadis').val();
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
