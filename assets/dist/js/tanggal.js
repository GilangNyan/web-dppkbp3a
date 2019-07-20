moment.locale('id');
var datetime = null;
var date = null;

var update = function () {
	date = moment(new Date());
	datetime.html(date.format('dddd, D MMMM YYYY H:mm:ss'));
}

$(document).ready(function () {
	datetime = $('#jam');
	update();
	setInterval(update, 1000);
});
