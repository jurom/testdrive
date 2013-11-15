<?php

$this->breadcrumbs = array(
	'Doctors',
);

$this->menu = array(
	array('label'=>'New Doctor', 'url' => array('create', 'topic_id' => -1)),
);

?>

<h1>Doctors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
));
?>