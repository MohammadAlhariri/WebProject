
$(document).ready(function(){
	
	$('input[type="number"],input[type="text"], input[type="password"], input[type="email"]').each(function() {
		$(this).val( $(this).attr('placeholder') );
    });
	
});