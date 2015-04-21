

	<meta charset='utf-8'/>
	<title>Xinh nhẹ nhàng - zoom</title>
	<style>
		/* styles unrelated to zoom */
		* { border:0; margin:0; padding:0; }
		p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

		/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display:inline-block;
			position: relative;
			width: 100%;
			height: 100%;
			overflow: hidden;
			background-color: #2c4762;
		}
		
		/* magnifying glass icon */
		.zoom:after {
			content:'';
			display:block; 
			/* width:33px; 
			height:33px; */
			position:absolute; 
			top:0;
			right:0;
			background:url(/public/plugin/simple-zoom/icon.png);
			opacity: 0.5;
		}

		.zoom img {
			display: block;
			overflow: hidden
			cursor: -moz-zoom-out; 
            cursor: -webkit-zoom-out; 
            cursor: zoom-out;
		}

		.zoom img::selection { background-color: transparent; }

		#ex2 img:hover { cursor: url(grab.cur), default; }
		#ex2 img:active { cursor: url(grabbed.cur), default; }
		
		.logo {
		    top: 10px;
		    left: 10px;
		    height: 30px;
		    position: fixed;
		}
	</style>
	<!-- script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script -->
	<script src='/public/plugin/simple-zoom/jquery.zoom.js'></script>
	<script>
		$(document).ready(function(){
			$('#ex1').zoom({ on: 'custom', hidesourceimg: true });
		});
	</script>
	
	<span class='zoom' id='ex1'>
		<img src="<?php echo base_url()?>/public/upload/<?php echo $postentry->imageurl; ?>" width="100%" height="100%" style="display: none">
	</span>
	
	<img class="logo" src="/public/ui/logo4.png" />

