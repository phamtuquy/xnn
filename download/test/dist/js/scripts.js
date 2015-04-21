/*!
 * jquery.basicPopup
 * 
 * 
 * @author Lucas Dasso
 * @version 1.0.0
 * Copyright 2015. ISC licensed.
 */
$(document).ready(function(){

		
	$('#ex31').click(function(){
		
		$.basicpopup({
			content: $('#zoomed').html()
		});
		
	});

});