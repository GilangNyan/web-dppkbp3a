$(function () {
	$('#allPost').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
		"order": [
			[2, "desc"]
		]
	});
});
