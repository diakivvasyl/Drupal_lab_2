$(document).ready(function () {

	jQuery("#search-btn").click(function () {
		let searchTerm = jQuery("#searchForm").val();
		let url = "https://en.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm + "&format=json&callback=?";

		jQuery.ajax({
			type: "GET",
			url: url,
			async: false,
			dataType: "json",
			success: function (data) {
				jQuery("#result").html("");
				for (let i = 0; i < data[1].length; i++) {
					jQuery("#result").prepend("<li><a href = " + data[3][i] + " target = 'blank' >" + data[1][i] + "</a><p>" + data[2][i] + "</p></li>");
				}
				jQuery("#searchForm").val(" ");
				console.log(data);
			},
			error: function (errorMessage) {
				alert("Error");
			}
		});
	});

	jQuery("#searchForm").keypress(function (e) {
		if (e.which == 13) {
			$("#search-btn").click();
		}
	});
});