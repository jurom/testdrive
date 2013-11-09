<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<?php if (Yii::app()->user->name == 'admin'): ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />
	
	<?php endif ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id' => $data->id)); ?>
	<br />
	
	<?php if (Yii::app()->user->name == 'admin'): ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
	
	<?php endif ?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

</div>