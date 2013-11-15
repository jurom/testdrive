<?php 

$this->breadcrumbs = array(
	'Topics' => array('topic/index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'Create New Thread', 'url' => array('thread/create', 'topic_id' => $model->id)),
	array('label' => 'Main Topics', 'url' => array('index')),
	array('label' => 'Create Topic', 'url' => array('create', 'topic_id' => $model->id)),
	array('label' => 'Update Topic', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Topic', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this topic?')),
);

?>

<h1><?php echo $model->title ?></h1>

<?php 
if (($dataProviderTopic->getItemCount() == 0) && ($dataProviderThread->getItemCount() == 0))
{
	echo 'Sorry, nobody has created any topics/threads under this topic yet.';
} else {
	if ($dataProviderTopic->getItemCount() != 0)
	{
		?>
		<div class="view">
			<b>Topics</b>
		<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider' => $dataProviderTopic,
			'itemView' => '_view',
			'enablePagination' => false,
		));
		?>
		</div>
		<?php
	}
	if ($dataProviderThread->getItemCount() != 0)
	{
		?>
		<div class="view">
			<b>Threads</b>
		<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider' => $dataProviderThread,
			'itemView' => '_viewThread',
			'enablePagination' => false,
		));
		?>
		</div>
		<?php
	}
}


?>