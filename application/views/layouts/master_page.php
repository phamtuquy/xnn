<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta content="INDEX,FOLLOW" name="robots" />
        <meta name="copyright" content="Xinh nhẹ nhàng" />
        <meta name="author" content="Xinh nhẹ nhàng" />
        <meta http-equiv="audience" content="General" />
        <meta name="resource-type" content="Document" />
        <meta name="distribution" content="Global" />
        <meta name="revisit-after" content="1 days" />
        <meta name="GENERATOR" content="xinhnhenhang.com" />
        <meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema" />

		<title><?php echo $title ?></title>
		<link rel="shortcut icon" href="/public/ui/fav.ico" type="image/x-icon">
		<script type="text/javascript" src="<?php echo base_url()?>public/scripts/jquery-2.1.3.min.js"></script>
		<!-- script src="http://code.jquery.com/jquery-1.11.2.min.js"></script -->
		<link rel="stylesheet" href="<?php echo base_url()?>public/css/style.css">
	</head>

	<body>
		<!-- div class="header"><span class="header_capital">X</span>inh <span class="header_capital">N</span>hẹ <span class="header_capital">N</span>hàng</div -->
		<div class="header"><a href="/"><img src="<?php echo base_url()?>public/ui/logo4.png" height="42px"></a></div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div align="center">
			<?php $this->load->view($content); ?>
		</div>
		<div class="fb-icon">
		    <a href="http://www.facebook.com/xinhnhenhang"><img width="64px" src="/public/ui/ec5656-facebook-64.png"></a>
		</div>
	</body>
</html>

