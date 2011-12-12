<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('word')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->word), array('view', 'id'=>$data->word)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />


</div>