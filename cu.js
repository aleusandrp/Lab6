$(document).ready(function(){
	$(".del").click(function(){
		var id = $(this).attr("data-id");
		//alert(id);
		$.ajax({
			url: 'del.php',
			type: 'POST',
			dataType: 'text',
			data: {param1: id},
			success: function(responce){
				alert("Удалена запись с id " + id);
        }
		});
    });
    $(".edit").click(function(){
		var id = $(this).attr("data-id");
		var url = "./edit.php?id="+id;
		$(location).attr('href',url);
    });
});