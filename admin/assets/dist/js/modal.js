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
	$(document).on('click', '.btn-edit', function () {
		var postId = $(this).data('postid');
		console.log(postId);
		$.ajax({
			url: "post/getSpecificPost",
			method: "POST",
			data: {
				id: postId
			},
			// dataType: 'JSON',
			success: function (data) {
				$('#id').val(postId);
				$('#judul').val(data.judul);
				CKEDITOR.instances.isi2.setData(data.isi);
				$('#gambarlama').val(data.image);
				$('#status').val(data.status);
				console.log(data);
			},
			error: function (data) {
				console.log(data);
			}
		});
	});
});
