$(document).ready(function () {
	$('#allPost').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
		"order": [
			[2, "desc"]
		]
	});
	$('#allPages').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
	});
	$('#allUser').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
	});
	$('#allAlbums').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
	});
	$('#tblkomentar').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
	});
	$('#semuaPesan').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
		"order": [
			[2, "desc"]
		]
	});
});
