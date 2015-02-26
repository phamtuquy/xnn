<?php
//$sql=mysql_query("SELECT * FROM messages ORDER BY mes_id DESC LIMIT 20");
for ($i = 0; $i < 10; $i++)
{
	$msgID= $i;
	$msg= 'Dong thu ' . $i;

?>
	<div id="<?php echo $msgID; ?>" class="message_box" > 
	<?php echo $msg; ?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</div> 
<?php
} 
?>