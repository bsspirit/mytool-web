<div class="view">
	<a href="javascript:void(0);" onclick="add()">增加</a>
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

<div id="navigator"></div>

<script src="/js/navigator.js"></script>
<script src="/js/jquery-impromptu.3.2.min.js"></script>

