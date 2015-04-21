/*!
 * jquery.basicPopup
 * 
 * 
 * @author Lucas Dasso
 * @version 1.0.0
 * Copyright 2015. ISC licensed.
 */
;(function($) {
	
	//Default settings
	var settings = {
		url: '',
		content: '',
		btnClose: true,
		mainClass : '',
		afterShow: false,
		pageX : -1, //Quy
		pageY : -1 //Quy
	}

	$.fn.basicpopup  = function(options, e) {
	    var $e = e;
		settings = $.extend(settings, options );
		//settings = $.extend(settings, e );
		settings.pageX = e.pageX;
		settings.pageY = e.pageY;
		if( settings.url != '' ){
			load_content(settings.url, $.basicpopup.open);
		}else if( settings.content != '' ){
			$.basicpopup.open( settings.content );
		}else{
			$.basicpopup.open( "Missing content" );
		}
	}
		
	$.fn.basicpopup.open  = function( content ) {
		var mainClass = '';
		if ( settings.mainClass ){
			mainClass = ' ' + settings.mainClass;
		}
		var mousePos = '<input type=hidden id=posX value=' + settings.pageX + ' >'; //Quy
		mousePos = mousePos + '<input type=hidden id=posY value=' + settings.pageY + ' >'; //Quy
		var popup_HTML = mousePos + '<div class="basicpopup-overlay"></div><div class="basicpopup-outer"><div class="basicpopup-inner"><div class="basicpopup-content'+mainClass+'">'+content+'</div></div></div>';
		$('body').find('.basicpopup-overlay').remove();
		$('body').find('.basicpopup-outer').remove();
		$('body').find('#posX').remove();
		$('body').find('#posY').remove();
				
		$('body').prepend( popup_HTML );

		if( settings.btnClose == true ) {
			//Add close button
			$('body').find('.basicpopup-content').prepend('<button class="basicpopup-btn-close">×</button>');
		}
				
		//Close popup targets
		$('body').on('click', '.basicpopup-content, .basicpopup-inner, .basicpopup-btn-close', function(elem){
			if(true || $(elem.target).is(this)){ //Quy
				$.basicpopup.close();
			}
		});
		
		$(document).keyup(function(e) {
			if (e.keyCode == 27) {   // esc
				$.basicpopup.close();
			}
		});
		
		if($.isFunction(settings.afterShow)) {
            settings.afterShow.call();
        }
	}
	
	$.fn.basicpopup.close  = function() {
		$('body').find('.basicpopup-overlay').remove();
		$('body').find('.basicpopup-outer').remove();
		$('body').off('click', '.basicpopup-content, .basicpopup-inner, .basicpopup-btn-close');
	}
	
	
	function load_content( url, callback ){
	
		url = ( typeof url == "undefined" || url == '' ) ? false : url;
		
		if( url == false) {
			alert('Falta la url del popup.');
			return false;
		}
		
		$.ajax({
			type: 'GET',
			url: url,
			async: false,
			dataType: 'html',
			success:function(data){		
				callback( data );
			},
			error:function(xhr, status, error){
				alert('Error inesperado.');
				return false;
			}
		});
	}

	$.extend({
		basicpopup : $.fn.basicpopup 
	});

})(jQuery);