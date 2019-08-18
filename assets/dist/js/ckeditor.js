CKFinder.setupCKEditor();
CKEDITOR.replace('isi');
CKEDITOR.replace('isi2');
CKEDITOR.replace('konten');
CKEDITOR.replace('kontenedit');
var sambutan = CKEDITOR.replace('sambutan');

sambutan.on('blur', function (evt) {
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
		}
	});
});
