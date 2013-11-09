<?php

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'micropost-form',
	'enableAjaxValidation'=>false,
	'action' => CHtml::normalizeUrl($action),
));
?>

	<?php if ($action == '#') { ?>
	<p class = "note">Fields with <span class="required">*</span> are required.</span>
	<?php } else 
		CHtml::$afterRequiredLabel = '';
	?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'content'); ?>
		<?php echo $form->textArea($model, 'content', array('rows'=>5,'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div>