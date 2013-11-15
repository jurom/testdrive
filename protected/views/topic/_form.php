
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'topic-form',
	'enableAjaxValidation' => false,
	'action' => $action,
));
?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 50, 'maxlength' => 64)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'description'); ?>
		<?php echo $form->textArea($model,'description', array('rows' => 3, 'cols' => 50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div>