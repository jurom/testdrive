<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'forumComment-form',
	'enableAjaxValidation' => false,
	'action' => CHtml::normalizeUrl($action),
));
?>

	<?php CHtml::$afterRequiredLabel = ''; ?>
	
	<div class="row">
		<?php echo $form->labelEx($modelFComment,'content'); ?>
		<?php echo $form->textArea($modelFComment,'content', array('rows' => 8, 'cols' => 50)); ?>
		<?php echo $form->error($modelFComment,'content'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($modelFComment->isNewRecord? 'Quick Reply' : 'Save') ?>
	</div>
<?php $this->endWidget(); ?>

</div>