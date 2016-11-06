$(document).ready(function(){
	$("tr .del").click(function(){
		var id = $(this).attr("data-id");
		//alert(id);
		$.ajax({
			url: 'del.php',
			type: 'POST',
			dataType: 'text',
			data: {param1: id},
			success: function(responce){
				alert("Удалена запись с id "+id);
        }
		});
    });
	$(".adduser").click(function(){
		alert("s");
		/*var id = $(this).attr("data-id");
		//alert(id);
		$.ajax({
			url: 'del.php',
			type: 'POST',
			dataType: 'text',
			data: {param1: id},
			success: function(responce){
				alert("Удалена запись с id "+id);
        }
		});*/
    });
    $(".del").click(function(){
		$(this).css("color","red");
    });
});