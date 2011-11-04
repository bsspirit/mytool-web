<h1>加密算法</h1>

<form method="POST">
	<p><input type="text" name="k" value="<?php echo $k?>" class="w400"/><p/>
	<p><input type="submit" value="查询"/><p/>
</form>  

<?php if(!empty($k)){?>
<div class="view">
	<div class="title" >URL(16位):</div> <?php echo 'http://'.$url_16?><br/>
	<div class="title">MD5(32位):</div> <?php echo $md5_32?><br/>
	<div class="title" >MD5(16位):</div> <?php echo $md5_16?><br/>
	<div class="title" >base64:</div> <?php echo $base64?><br/>
</div>
<?php } ?>
