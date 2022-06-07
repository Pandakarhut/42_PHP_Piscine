let idx = 0;
$(document).ready(function(){
	if ($.cookie()){
		let all_cookies = $.cookie();
		let cnt = 0;
		$.each(all_cookies, function(key, value){
			let elem = $("<div class=\"li\" id=" + key + ">" + value + "</div>");
			$("#ft_list").prepend(elem);
			cnt++;
		});
		idx = cnt;
	}
})

$(document).ready(function(){
	$("#New").on("click", function(){
		let toDo = prompt("Please enter a to do item");
		if (toDo != null && toDo.search(/^[\s]*$/) < 0){
				let elem = $("<div class=\"li\" id=" + idx + ">" + toDo + "</div>");
				$("#ft_list").prepend(elem);
				$.cookie(idx, toDo);
				idx++;
		}
	})
})

$(document).on('click', '.li', function(){
	if(confirm("Confirm to remove the \"TO DO item?\"")){
		let elmId = $(this).attr("id");
		let elmV = $(this).text();
		$(this).remove();
		$.removeCookie(elmId, elmV, { path: '/'});
	};
})