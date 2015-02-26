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

			});
		</script>


			<?php
				//echo ($firstentries);
				if (isset($firstentries) && !empty($firstentries)) {
                	foreach ($firstentries as $key => $value ){//$key => $value) {
			?>
                        <div id="<?php echo $value->id; ?>" class="message_box" ><?php //var_dump($value->ImageURL);?> 
						<div class="img_box"><?php //echo $value->id; ?>
							<img class="home_img" src="<?php echo base_url()?>/public/upload/<?php echo $value->imageurl; ?>" /><br>
                        </div><br>
			<?php }
				} ?>
			
			<div id="last_msg_loader"></div>
		</div>
