<?php 

$this->breadcrumbs = array(
	'Main Topics' => array('index'),
	$model->id => array('view', 'id' => $model->id),
	'Update',
);

$this->menu = array(
	array('label' => 'Main Topics', 'url' => array('index')),
	array('label' => 'Create New Topic', 'url' => array('create','topic_id' => $model->id)),
	array('label' => 'View Topic', 'url' => array('view', 'id' => $model->id)),
);

?>

<h1>Update Topic <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array(
	'model' => $model,
	'action' => $action,
)); 
?>