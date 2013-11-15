<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Feel free to leave any comments or new Threads on forum</p>
<p>If you are not registered yet, you can do so <?php echo CHtml::link('here', array('user/create')); ?></p>

<p>On the forum you may only create threads if you log in</p>
	