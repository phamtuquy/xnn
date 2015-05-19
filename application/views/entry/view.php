<link href="/public/plugin/simple-popup/css/basicPopup.css" rel="stylesheet" type="text/css">
<link href="/public/plugin/simple-popup/css/basicPopupDark.css" rel="stylesheet" type="text/css">
<script src="/public/plugin/simple-popup/js/jquery.basicPopup.js"></script>
<script src="/public/plugin/lazyload/js/jquery.unveil.js"></script>

<script type="text/javascript">
                $(document).ready(function() {
				    var $id = $(".entry_img").attr("id");
				    
				    //lazy load image
				    $(".entry_img").unveil(0, function (){
				        $(this).load(function() {
				            $(this).css({width : "600px", opacity : "1"});
				        });
				    });
				    
				    
				    //open zoom popup when click
				    $(".entry_img").click(function(e){
                		$.basicpopup({
                			url : '/zoom/' + $id,
                			btnClose : false
                		}, e);
                		
                	});
				    
				    $(".entry_img").trigger("click");
                });
				
</script>
<div class="box">
    <img id="<?php echo $postentry->id; ?>" width="1024px" class="entry_img" 
        src="/public/ui/loader.gif" data-src="<?php echo base_url()?>/public/upload/<?php echo $postentry->imageurl; ?>" />
</div>