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
	var groupColumn = 2;
	var table = $('#allPages').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		},
		"columnDefs": [{
			"visible": false,
			"targets": groupColumn
		}],
		"order": [
			[groupColumn, 'asc']
		],
		"displayLength": 15,
		"drawCallback": function (settings) {
			var api = this.api();
			var rows = api.rows({
				page: 'current'
			}).nodes();
			var last = null;

			api.column(groupColumn, {
				page: 'current'
			}).data().each(function (group, i) {
				if (last !== group) {
					$(rows).eq(i).before(
						'<tr class="group"><td colspan="4">' + group + '</td></tr>'
					);
					last = group;
				}
			});
		}
	});
	//Order Grouping
	$('#allPages tbody').on('click', 'tr.group', function () {
		var currentOrder = table.order()[0];
		if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
			table.order([groupColumn, 'desc']).draw();
		} else {
			table.order([groupColumn, 'asc']).draw();
		}
	});
});
