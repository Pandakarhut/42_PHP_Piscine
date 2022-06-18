var newId = 1;

//When loading page, get possible items from cookie
if (document.cookie && document.cookie != "") {
	var cookies = document.cookie.split(';');

	for (var i = 0; i < cookies.length; i++) {
		var values = cookies[i].split("=");
		addToList(values[1], values[0].trim());
		newId = parseInt(values[0]) + 1;
	}
}

//function to add a new item, called when New is clicked
function newItem() {
	var item = prompt("Please name your new item");

	//Make sure item length is over 0 and is not just spaces.
	var onlySpaces = item.search(/^[\s]*$/);

	if (item.length > 0 && onlySpaces < 0) {
		addToList(item, newId);
		createCookie(item, newId)
		newId++;
	}
}

function addToList(item, id) {
	var itemDiv = document.createElement("div");
	itemDiv.setAttribute('id', id);
	itemDiv.setAttribute('class', "listing");
	itemDiv.setAttribute('onclick', 'remove(this)');
	itemDiv.innerHTML = item
	var listDiv = document.getElementById("ft_list");
	listDiv.insertBefore(itemDiv, listDiv.children[0]);
}

// to remove list item and remove its cookie
function remove(item) {
	if (confirm("Confirm removal of item '" + item.innerHTML + "'?")) {
		document.cookie = item.id + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;";
		item.remove();
	}
}

function createCookie(item, id) {
	var cookie = id + "=" + item + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; secure; path=/;";
	document.cookie = cookie;
}
