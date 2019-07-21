$(function () {
	//-------------
	//- DONUT CHART -
	//-------------
	// Get context with jQuery - using jQuery's .get() method.
	var donutChartCanvas = $('#browserchart').get(0).getContext('2d')
	var dataBrowser = []
	var dataJumlah = []

	$.post("admin/home/getChartData", function (data) {
		var obj = JSON.parse(data);
		$.each(obj, function (test, item) {
			dataBrowser.push(item.browser)
			dataJumlah.push(item.jumlah)
		})
		var donutData = {
			labels: dataBrowser,
			datasets: [{
				data: dataJumlah,
				backgroundColor: [dynamicColors(), dynamicColors(), dynamicColors(), dynamicColors(), dynamicColors(), dynamicColors(), dynamicColors(), dynamicColors()],
			}]
		}
		var donutOptions = {
			maintainAspectRatio: false,
			responsive: true,
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		var donutChart = new Chart(donutChartCanvas, {
			type: 'doughnut',
			data: donutData,
			options: donutOptions
		})
	})
});

var dynamicColors = function () {
	var r = Math.floor(Math.random() * 255);
	var g = Math.floor(Math.random() * 255);
	var b = Math.floor(Math.random() * 255);
	return "rgb(" + r + "," + g + "," + b + ")";
}
