<?php

$this->breadcrumbs = array( 
	'Doctors' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Doctors', 'url' => array('index')),
	array('label' => 'Create New Doctor', 'url' => array('create')),
	array('label' => 'Update Doctor', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Doctor', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this doctor?')),
);

#$actionEdit = '?r=comment/update&amp;';
$actionEdit = '/comment/update?';


Yii::app()->clientScript->registerScript('edit', "
var htmls = new Array();

function displayEditCommentForm(id,content_value) {
    htmls[id] = document.getElementById(".'"comment_"+id'.").innerHTML;
    document.getElementById(".'"comment_"+id'.").innerHTML='".'\
    <div class="form">\
        <form id="comment-form-edit" action="/yiitest/testdrive/index.php'.$actionEdit.'id='."'+id+'".'" method="post">\
            <div class="row"><label for="Comment_content" class="required">Content</label>\
                <textarea rows="5" cols="50" name="Comment[content]" id="Comment_content">'."'+content_value+'".'</textarea>\
            </div>\
            <div class="row buttons">\
                <input type="submit" name="yt0" value="Save" />\
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

<h1>View Doctor <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'area',
	),
)); ?>

<?php $this->renderPartial('_formComment', array(
	'model' => $model,
	'modelComment' => $modelComment,
	'action' => $action,
));
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_viewComment'
));
?>