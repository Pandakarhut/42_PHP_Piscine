var idx = 0;

// to load the items from csv file everytime its opened
$(document).ready(function(){
    $.get('select.php', function(data, status) {
        items = jQuery.parseJSON(data);
        jQuery.each(items, function(key, value){
        let elem = $("<div class=\"li\" id=" + key + ">" + value + "</div>");
        $("#ft_list").prepend(elem);
        idx++;
        })
    })
});

// to add a new item into the csv file and into the website
$(document).ready(function(){
	$("#New").on("click", function(){
		let toDo = prompt("Please enter a to do item");
		if (toDo != null && toDo.search(/^[\s]*$/) < 0){
				let elem = $("<div class=\"li\" id=" + idx + ">" + toDo + "</div>");
				$("#ft_list").prepend(elem);
                $.get('insert.php?todo=' + toDo, function(){
                })
				idx++;
		}
	})
})

// to delete the item from the website and the csv file
$(document).on('click', '.li', function(){
	if(confirm("Confirm to remove the \"TO DO item?\"")){
		let elmId = $(this).attr("id");
		let elmV = $(this).text();
		$(this).remove();
		$.get('delete.php?id=' + elmId, function(){
        })
	};
})