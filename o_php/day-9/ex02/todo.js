var idx = 0;

//re-calling the cookies from the dom
if (document.cookie && document.cookie != ""){
	
	var Arr = document.cookie.split(';');
	
	for (var k = 0; k < Arr.length; k++){
		var values = Arr[k].split("=");
		listing(values[1], values[0]);
	}
	idx = k;
}

//creating a list item
function listing(textValue, ix){
	var dv = document.createElement("DIV");
	dv.setAttribute('id', ix);
	dv.setAttribute('onclick', 'removeItem(this.id)');
	var tx = document.createTextNode(textValue);
	var ls = document.createElement("li");
	ls.appendChild(tx);
	dv.appendChild(ls);
	var ftList = document.getElementById("ft_list");
	ftList.insertBefore(dv, ftList.children[0]);
}

// to add a list item through the button and creating cookie of it afterwards
function addItem(){
	let toDo = prompt("Please enter a to do item");
	let sp = toDo.search(/^[\s]*$/);
	if (toDo != null && (toDo.search(/^[\s]*$/) < 0)){
			listing(toDo, idx);
			var nwCookie = idx + "=" + toDo + 
			"; expires=Thu, 18 Dec 2050 12:00:00 UTC; secure; path=/;";
			idx++;
			document.cookie = nwCookie;
	}
}

// to remove list item and remove its cookie
function removeItem(clicked_id){
	if (confirm("Confirm to remove the \"TO DO item?\"")){
		element = document.getElementById(clicked_id);
		element.remove();
		document.cookie = clicked_id + 
		"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	}
}