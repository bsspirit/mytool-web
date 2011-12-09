<?php
$this->menu=array(
	array('label'=>'Create BlogContent', 'url'=>array('create')),
	array('label'=>'Manage BlogContent', 'url'=>array('admin')),
);
?>
<div class="view">
	<a href="javascript:void(0);" onclick="function_blog_feed()">Blog</a>
	<a href="javascript:void(0);" onclick="function_blog_add()">撰写</a>
	<a href="javascript:void(0);" onclick="click_blog_close()">隐藏</a>
</div>

<div id="blog_dialog" class="view">
	<div id="blog_form" class="form"></div>
</div>

<div id="desktop" class="view"></div>

<script src="/js/editor/kindeditor-min.js"></script>
<script src="/js/editor/zh_CN.js"></script>
<script src="/js/blog.js"></script>
