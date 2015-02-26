<script type="text/javascript" src="<?php echo base_url()?>public/scripts/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/scripts/dropzone.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>public/css/dropzone/dropzone.css">

New entry view

<form action="<?php echo base_url()?>admin/postentry/newentry" class="dropzone" id="my-awesome-dropzone">
	<div class="fallback">
		<input name="file" type="file" multiple />
	</div>
</form>