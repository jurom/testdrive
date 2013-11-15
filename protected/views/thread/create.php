<?php

$this->breadcrumbs = array(
	'Forum' => array('topic/index'),
	'Create New Thread',
);

$this->menu = array(
	array('label' => 'Main Topics', 'url' => array('topic/index')),
);

?>
<h1>Create New Thread under <?php echo ($model->topic_id == -1) ? 'Main Topic' : $model->topic->title ?></h1>

<?php $this->renderPartial('_form', array(
	'model' => $model,
	'action' => $action,
));

?>