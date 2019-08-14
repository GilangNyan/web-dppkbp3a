// $(document).on("click", ".btn-edit", function () {
// 	var postId = $(this).data('postid');
// 	var judul = $(this).data('judul');
// 	var isi = $(this).data('isi');
// 	var gambar = $(this).data('gambar');
// 	var status = $(this).data('status');

// 	$(".modal-body #id").val(postId);
// 	$(".modal-body #judul").val(judul);
// 	// $(".modal-body #isi2").val(isi);
// 	CKEDITOR.instances.isi2.setData(isi);
// 	$(".modal-body #gambarlama").val(gambar);
// 	$(".modal-body #status").val(status);
// });

$(document).ready(function () {
	$('.btn-edit').click(function (e) {
		e.preventDefault();
		var postId = $(this).data('postid');
		const href = $(this).attr('href');
		console.log(postId);
		var tr = $(this).closest('tr');
		var judul = tr.find('.val-judul').val();
		var isi = tr.find('.val-isi').val();
		var gambar = tr.find('.val-gambar').val();
		var status = tr.find('.val-status').val();
		console.log(judul);

		$(".modal-body #id").val(postId);
		$(".modal-body #judul").val(judul);
		// $(".modal-body #isi2").val(isi);
		CKEDITOR.instances.isi2.setData(isi);
		$(".modal-body #gambarlama").val(gambar);
		$(".modal-body #status").val(status);
		// $.ajax({
		// 	url: href,
		// 	method: "POST",
		// 	data: {
		// 		id: postId
		// 	},
		// 	dataType: 'json',
		// 	success: function (data) {
		// 		$('#id').val(postId);
		// 		$('#judul').val(data.judul);
		// 		CKEDITOR.instances.isi2.setData(data.isi);
		// 		$('#gambarlama').val(data.image);
		// 		$('#status').val(data.status);
		// 		console.log(data);
		// 	},
		// 	error: function (data) {
		// 		console.log(data);
		// 	}
		// });

	});
	$('.btn-editmenu').click(function (e) {
		e.preventDefault();
		var id = $(this).data('id');
		var nama = $(this).data('nama');

		$(".modal-body #idmenu").val(id);
		$(".modal-body #namaedit").val(nama);
	})
});
