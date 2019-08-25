function showFormBalas(id) {
	if (document.getElementById(id).style.display === "none") {
		document.getElementById(id).style.display = "block";
	} else {
		document.getElementById(id).style.display = "none";
	}
}

moment.locale('id');
var tanggal = $('#tanggaldatabase').text();
let date = moment(tanggal).utc().format('dddd, D MMMM YYYY H:mm');
$('#tanggalpost').html(date);