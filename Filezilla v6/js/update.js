$(document).ready(function() {
	$('.editbtn').click(function() {
		var currentTD = $(this).parents('tr').find('td');
		
		var field = ($(this).closest('tr').attr('id'));

		if ($(this).html() == 'Edit') {
			currentTD = $(this).parents('tr').find('td');			
				$(currentTD[1]).prop('contenteditable', true);
				$(currentTD[1]).focus();
				
			
		} else {
			$(currentTD[1]).prop('contenteditable', false);
			$.ajax({
				type : 'POST',
				url : "changeCustomer.php",
				data : {
					level : JSON.stringify(currentTD[1].innerHTML),
					field : field
				},
				success : function(msg) {
				}
			});
		}

		$(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit');

	});
});
