<?php 

$this->breadcrumbs = array(
	'Main Topics' => array('topic/index'),
);

$this->menu = array(
	array('label' => 'Main Topics', 'url' => array('topic/index')),
	array('label' => 'View Thread', 'url' => array('view', 'id' => $model->id)),
	array('label' => 'Back to parent topic', 'url' => array('topic/view', 'id' => $model->topic_id)),
);

?>

<h1>Update Thread <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array(
	'model' => $model,
	'action' => $action,
));
?>