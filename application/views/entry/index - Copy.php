<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Test thử</title>
		<script type="text/javascript" src="<?php echo base_url()?>public/scripts/jquery-1.2.6.pack.js"></script>

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

	</head>

	<body>
		<div align="center">
			<?php
				//echo ($firstentries);
				if (isset($firstentries) && !empty($firstentries)) {
                	foreach ($firstentries as $key => $value ){//$key => $value) {
			?>
                        <div id="<?php echo $value->Id; ?>" class="message_box" ><?php var_dump($value->ImageURL); 
						
                        //echo $value['ImageUrl']; ?><br>
                        <br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
			<?php }
				} ?>
			
			<div id="last_msg_loader"></div>
		</div>
	</body>
</html>

