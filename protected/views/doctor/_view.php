<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?></b>
	<?php echo CHtml::encode($data->area); ?>
	<br />
</div>