<?php

$this->breadcrumbs = array(
	'Topics' => array('topic/index'),
);

$this->menu = array(
	array('label' => 'Update Thread', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Thread', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this thread?')),
	array('label' => 'Main Topics', 'url' => array('topic/index')),
);

Yii::app()->clientScript->registerScript('edit', "
var htmls = new Array();

function displayEditCommentForm(id, content_value) {
    htmls[id] = document.getElementById(".'"comment_"+id'.").innerHTML;
    document.getElementById(".'"comment_"+id'.").innerHTML='".'\
    <div class="form">\
        <form id="forumComment-form" action="/yiitest/testdrive/index.php/forumComment/update?id='."'+id+'".'" method="post">\
            <div class="row">\
                <label for="ForumComment_content" class="required">Content</label>\
                <textarea rows="8" cols="50" name="ForumComment[content]" id="ForumComment_content">'."'+content_value+'".'</textarea>\
            </div>\
            <div class="row buttons">\
                <input type="submit" name="yt2" value="Save" />\
                <input type="button" onclick="hideEditCommentForm('."'+id+'".')" value="Cancel" />\
            </div>\
        </form>\
    </div>'."';
}

function hideEditCommentForm(id) {
    document.getElementById(".'"comment_"+id'.").innerHTML=htmls[id];
}
",CClientScript::POS_HEAD);

?>

<h1><?php echo $model->title ?></h1>

<b>Description: </b>
<p>
<?php echo nl2br(CHtml::encode($model->description)) ?>
</p>

<?php 

if ($dataProvider->getItemCount() == 0)
{
	?>
	<hr>
	<b>No replies</b>
	<br />
	Be the first to reply to this thread !
	<br />
	<br />
	<hr>
	<?php
}
else
{
	$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '_viewComment',
	));
}

$this->renderPartial('_formComment', array(
	'modelFComment' => $modelFComment,
	'action' => $action,
))
?>
