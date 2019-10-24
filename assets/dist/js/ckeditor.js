CKFinder.setupCKEditor();
CKEDITOR.replace('isi');
CKEDITOR.replace('isi2');
CKEDITOR.replace('konten');
CKEDITOR.replace('kontenedit');
var sambutan = CKEDITOR.replace('sambutan');

$('#btnSambutan').on('click', function () {
	var data = CKEDITOR.instances.sambutan.getData();
	$.ajax({
		url: 'preferences/editSambutan',
		method: 'POST',
		dataType: 'text',
		data: {
			sambutan: data
		},
		success: function (response) {
			console.log('Sambutan berubah ' + data.length);
			Swal.fire({
				position: 'top-end',
				type: 'success',
				title: 'Sambutan Kepala Dinas berhasil diubah',
				toast: true,
				showConfirmButton: false,
				timer: 3000
			});
		}
	});
});
