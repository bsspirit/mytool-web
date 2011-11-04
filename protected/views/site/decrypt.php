<h1>解密算法</h1>

<div class="view">
	<h2>MD5解密</h2>
	<form method="POST">
		<p><input type="text" name="md5" value="<?php echo $md5?>" class="w400"/><p/>
		<p><input type="submit" value="查询"/><p/>
	</form>
	<?php if(!empty($md5)){?>
	<div class="view">
		<div class="title">原始值:</div> <?php echo $k?><br/>
	</div>
	<?php }?>
</div>