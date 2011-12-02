<link rel="stylesheet" type="text/css" href="/css/imgareaselect-default.css" />

<div class="view">
	<a href="javascript:void(0);" onclick="function_catalog()">分类</a>
	<a href="javascript:void(0);" onclick="function_add()">增加</a>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'增加网站',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>600,
    ),
));
?>
<div id="navigator_add_1" class="form"></div>
<div id="navigator_add_2" class="form"></div>
<?php $this->endWidget();?>
</div>

<div class="view">
	<div id="navigator"></div>
</div>

<script src="/js/navigator.js"></script>
<script src="/js/jquery.imgareaselect.pack.js"></script>
