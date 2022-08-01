var newId = 1;

$(document).ready(function () {
	if (document.cookie && document.cookie != "") {
		var cookies = document.cookie.split(';');
		$.each(cookies, function () {
			var values = this.split("=");
			var itemDiv = $("<div id=\"" + values[0] + "\" class=\"listing\">" + values[1] + "</div>");
			$("#ft_list").prepend(itemDiv);
			newId = parseInt(values[0]) + 1;
		});
	}
});

$(document).ready(function () {
	$("#new").on("click", function () {
		var item = prompt("Please name your new item");
		//Make sure item length is over 0 and is not just spaces.
		var onlySpaces = item.search(/^[\s]*$/);

		if (item.length > 0 && onlySpaces < 0) {
			var itemDiv = $("<div id=\"" + newId + "\" class=\"listing\">" + item + "</div>");
			$("#ft_list").prepend(itemDiv);
			var cookie = newId + "=" + item + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; secure; path=/;";
			document.cookie = cookie;
			newId++;
		}
	})
})

$(document).on("click", ".listing", function () {
	if (confirm("Confirm removal of item '" + $(this).text() + "'?")) {
		document.cookie = $(this).attr("id") + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
		$(this).remove();
	};
});
