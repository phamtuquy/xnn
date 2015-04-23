<script>
                $(".img_box img").each(function (){
				    var $id = $(this).attr("id");
				    $(this).unveil();
				    $(this).click(function(e){
                		$.basicpopup({
                			url : '/zoom/' + $id,
                			btnClose : false
                		}, e);
                		
                	});
				    
				});
</script>
<?php
				//echo ($firstentries);
				//echo ($last_msg_id);
				if (isset($nextentries) && !empty($nextentries)) {
                	foreach ($nextentries as $key => $value ){//$key => $value) {
			?>
                        <div id="<?php echo $value->id; ?>" class="message_box" ><?php //var_dump($value->ImageURL);?> 
						<div class="img_box"><?php //echo $value->id; ?>
						<img class="home_img" src="/public/ui/bg.png" data-src="<?php echo base_url()?>/public/upload/<?php echo $value->imageurl;  ?>" id=<?php echo $value->id ?> /><br>
                        </div><br>
			<?php }
				} ?>
				



