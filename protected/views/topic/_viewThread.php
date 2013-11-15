<div class="view">

	<h3><?php echo CHtml::link(CHtml::encode($data->title), array('thread/view', 'id' => $data->id)); ?></h3>
	<em><?php echo CHtml::encode(substr($data->description,0,80).'...'); ?></em>
	<br />
	<b>Created by: </b><?php echo CHtml::encode($data->user->username) ?>
</div>