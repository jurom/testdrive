<?php

$this->breadcrumbs = array(
	'Doctors' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Doctors', 'url' => array('index')),
);

?>

<h1>Create New Doctor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>