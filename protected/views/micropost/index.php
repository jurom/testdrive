<?php

$this->breadcrumbs = array(
	'Microposts',
);

$this->menu = array(
	array('label' => 'Create Post', 'url' => array('create')),
);
?>

<h1>Leave a comment here</h1>

<?php $this->renderPartial('_form', array(
	'model' => $model, 
	'action' => $action,
));
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
));
?>