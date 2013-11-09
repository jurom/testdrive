<?php

$this->breadcrumbs = array( 
	'Doctors' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Doctors', 'url' => array('index')),
	array('label' => 'Create New Doctor', 'url' => array('create')),
	array('label' => 'Update Doctor', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Doctor', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this doctor?')),
);

?>

<h1>View Doctor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'area',
	),
)); ?>

<?php $this->renderPartial('_formComment', array(
	'model' => $model,
	'modelComment' => $modelComment,
	'action' => $action,
));
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_viewComment'
));
?>