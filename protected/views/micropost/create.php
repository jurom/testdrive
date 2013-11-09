<?php

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Browse Posts', 'url'=>array('index')),
);

?>

<h1>Create new Post</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'action' => $action)); ?>