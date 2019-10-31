$('.videomodal').on('click', function (e) {
	e.preventDefault();
	var id = $(this).data('id');
	var href = $(this).attr('href');
	$.ajax({
		url: href,
		type: 'POST',
		dataType: 'text',
		data: {
			id: id
		},
		success: function (data, status, xhr) {
			var hasil = JSON.parse(data);
			var url = $('#url').val();
			var videourl = url + hasil['filename'];
			$('#framevid').attr('src', videourl);
			$('.modal-title').text(hasil['judul']);
			$('#deskripsi').text(hasil['deskripsi']);
			$('#videomodal').modal('show');
		}
	});
});

$('#videomodal').on('hidden.bs.modal', function () {
	$('#framevid').attr('src', '');
});
