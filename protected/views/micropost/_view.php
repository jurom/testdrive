<?php

?>

<div class="view">
	
	<b><?php echo CHtml::link(CHtml::encode($data->name == Yii::app()->user->name ? 'YOU' : $data->name).' wrote', array('micropost/view', 'id'=>$data->id)); ?>:</b>

	<p>
	<?php echo CHtml::encode($data->content) ?>
	</p>
	<em>
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />
	
	<?php if ($data->created != $data->modified) { ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />
	<?php } ?>
	</em>
</div>