<?php

$this->breadcrumbs = array(
	'Doctors' => array('index'),
	$model->id => array('view', 'id' => $model->id),
	'Update',
);

$this->menu = array(
	array('label' => 'List Doctors', 'url' => array('index')),
	array('label' => 'Create New Doctor', 'url' => array('create')),
	array('label' => 'View Doctor', 'url' => array('view', 'id' => $model->id)),
);

?>

<h1>Update Doctor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>