<?php

$this->breadcrumbs = array(
	'Forum' => array('index'),
	'Create Topic',
);

$this->menu = array(
	array('label' => 'Main Topics', 'url' => array('index')),
);

?>
<h1>Create New Topic under <?php echo ($model->topic_id == -1) ? 'Main Topics' : $model->topic->title ?></h1>

<?php $this->renderPartial('_form', array(
	'model' => $model,
	'action' => $action,
)); 

?>