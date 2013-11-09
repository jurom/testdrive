<?php

$this->breadcrumbs=array(
	'Users' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label'=>'Browse posts', 'url'=>array('index')),
	array('label'=>'Create new post','url'=>array('create')),
	array('label'=>'Update a post','url'=>array('update', 'id' => $model->id)),
	array('label'=>'Delete a post','url' => '#', 'linkOptions' => array('submit'=>array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this post?')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'content',
		'created',
		'modified',
	),
)); ?>