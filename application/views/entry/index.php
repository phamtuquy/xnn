<link href="/public/plugin/simple-popup/css/basicPopup.css" rel="stylesheet" type="text/css">
<link href="/public/plugin/simple-popup/css/basicPopupDark.css" rel="stylesheet" type="text/css">
<script src="/public/plugin/simple-popup/js/jquery.basicPopup.js"></script>
<script src="/public/plugin/lazyload/js/jquery.unveil.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				function last_msg_funtion() {

					var ID = $(".message_box:last").attr("id");
					//$('div#last_msg_loader').html('<img src="bigLoader.gif">');
					//$.post("index.php?action=get&last_msg_id=" + ID, function(data) {
					$.post("<?php echo base_url()?>entry/get/" + ID, function(data) {
						if (data != "") {
							$(".message_box:last").after(data);
						}
						$('div#last_msg_loader').empty();
					});
				};

				$(window).scroll(function() {
					if ($(window).scrollTop() == $(document).height() - $(window).height()) {
						last_msg_funtion();
					}
				});
				
				$(".img_box img").each(function (){
				    var $id = $(this).attr("id");
				    
				    $(this).unveil(0, function (){
				        $(this).load(function() {
				            $(this).css({width : "600px", opacity : "1"});
				        });
				    });
				    
				    $(this).click(function(e){
                		$.basicpopup({
                			url : '/zoom/' + $id,
                			btnClose : false
                		}, e);
                		
                	});
				    
				    
				});

			});
		</script>
		
		<style>
		    .img_box img{
                cursor: -moz-zoom-in; 
                cursor: -webkit-zoom-in; 
                cursor: zoom-in;
            }
		</style>


			<?php
				//echo ($firstentries);
				if (isset($firstentries) && !empty($firstentries)) {
                	foreach ($firstentries as $key => $value ){//$key => $value) {
			?>
                        <div id="<?php echo $value->id; ?>" class="message_box" ><?php //var_dump($value->ImageURL);?> 
						<div class="img_box"><?php //echo $value->id; ?>
							<img class="home_img" src="/public/ui/loader.gif" data-src="<?php echo base_url()?>/public/upload/<?php echo $value->imageurl; ?>" id=<?php echo $value->id ?> /><br>
                        </div><br>
			<?php }
				} ?>
			
			<div id="last_msg_loader"></div>
		</div>

