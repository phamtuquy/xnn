<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title ?></title>
		<script type="text/javascript" src="<?php echo base_url()?>public/scripts/jquery-1.2.6.pack.js"></script>
		<link rel="stylesheet" href="<?php echo base_url()?>public/css/style.css">
	</head>

	<body>
		<!-- div class="header"><span class="header_capital">X</span>inh <span class="header_capital">N</span>hẹ <span class="header_capital">N</span>hàng</div -->
		<div class="header"><img src="<?php echo base_url()?>public/ui/logo4.png" height="42px"></div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div align="center">
			<?php $this->load->view($content); ?>
		</div>
	</body>
</html>

