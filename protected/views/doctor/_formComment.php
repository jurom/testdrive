<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'comment-form',
	'enableAjaxValidation' => false,
	'action' => CHtml::normalizeUrl($action),
));
?>

	<?php CHtml::$afterRequiredLabel = ''; ?>
	
	<div class="row">
		<?php echo $form->labelEx($modelComment,'content'); ?>
		<?php echo $form->textArea($modelComment,'content', array('rows' => 5, 'cols' => 50)); ?>
		<?php echo $form->error($modelComment,'content'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($modelComment->isNewRecord? 'Create' : 'Save') ?>
	</div>
<?php $this->endWidget(); ?>

</div>