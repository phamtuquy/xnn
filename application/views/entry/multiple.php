<link href="/public/plugin/simple-popup/css/basicPopup.css" rel="stylesheet" type="text/css">
<link href="/public/plugin/simple-popup/css/basicPopupDark.css" rel="stylesheet" type="text/css">
<script src="/public/plugin/simple-popup/js/jquery.basicPopup.js"></script>
<script src="/public/plugin/lazyload/js/jquery.unveil.js"></script>

<link rel="stylesheet" href="/public/css/justifiedGallery.min.css"  type="text/css" />
<script src="/public/scripts/jquery.justifiedGallery.min.js"></script>

<script type="text/javascript">
                $(document).ready(function() {
                    $("#mygallery").justifiedGallery({
                        rowHeight : 280,
                        lastRow : 'nojustify',
                        margins : 3
                    });
                });
</script>

<?php 
    echo $pagination
?>
<div style="width: 100%; background-color: #fff" id="wrapper">
    <div id="mygallery" >
    <?php
    		//echo ($firstentries);
    		if (isset($postentry) && !empty($postentry)) {
                foreach ($postentry as $key => $value ){//$key => $value) {
    ?>
                    <a href="#">
    				    <img class="home_img_getrid" src="<?php echo base_url()?>/public/upload/<?php echo $value->imageurl; ?>" id=<?php echo $value->id ?> />
    				</a>
    <?php }
        } ?>
    </div>
</div>
<p></p>
<?php 
    echo $pagination
?>