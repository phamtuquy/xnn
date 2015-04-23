<script>
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
</script>
<?php
				//echo ($firstentries);
				//echo ($last_msg_id);
				if (isset($nextentries) && !empty($nextentries)) {
                	foreach ($nextentries as $key => $value ){//$key => $value) {
			?>
                        <div id="<?php echo $value->id; ?>" class="message_box" ><?php //var_dump($value->ImageURL);?> 
						<div class="img_box"><?php //echo $value->id; ?>
						<img class="home_img" src="/public/ui/loader.gif" data-src="<?php echo base_url()?>/public/upload/<?php echo $value->imageurl;  ?>" id=<?php echo $value->id ?> /><br>
                        </div><br>
			<?php }
				} ?>
				

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62172898-1', 'auto');
  ga('send', 'pageview');

</script>

