
$(document).ready(function(){
	
	$('input[type="number"],input[type="text"], input[type="password"]').each(function() {
		$(this).val( $(this).attr('placeholder') );
    });
	
});