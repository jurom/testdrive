<?php

$this->breadcrumbs = array(
	'Forum',
);

$this->menu = array(
	array('label' => 'New Main Topic', 'url' => array('create', 'topic_id' => -1)),
	array('label' => 'New Thread', 'url' => array('thread/create', 'topic_id' => -1)),
);

?>

<h1>Forum</h1>
<div class="view">
<b>Topics</b>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProviderTopic,
	'itemView' => '_view',
));
?>
</div>
<?php
if ($dataProviderThread->getItemCount() != 0)
{
	?> 
	<div class="view">
		<b>Threads</b>
	<?php
	$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProviderThread,
		'itemView' => '_viewThread',
	));
	?>
	</div>
	<?php
}
?>