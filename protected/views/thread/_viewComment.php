<div id="<?php echo "comment_".$data->id; ?>" class="view">
	<?php $user = $data->user ?>
	<table style="border=0">
		<tr>
			<td style="width:90%">
				<b><?php echo CHtml::link(CHtml::encode($user->username == Yii::app()->user->name ? 'YOU' : $user->username.' wrote'), array('user/view', 'id' => $user->id)); ?></b>
				
				<p>
				<?php echo nl2br(CHtml::encode($data->content)) ?>
				</p>
				<em>
				<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
				<?php echo CHtml::encode($data->created); ?>
				<br />
				<?php if ($data->created != $data->modified) { ?>
					<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
					<?php echo CHtml::encode($data->modified); ?>
					<br />
				<?php } ?>
				</em>
			</td>
			<td>
				<?php if ((Yii::app()->user->id == $data->user_id) || (Yii::app()->user->name == 'admin'))
					{
						$formattedContent = str_replace("\r\n",'\\n',$data->content);
						echo CHtml::button('Delete', array(
							'submit' => array('forumComment/delete', 'id' => $data->id),
							'confirm' => 'Are you sure you want to delete this comment?',
						));
						echo CHtml::button('Edit', array(
						'onclick' => 'displayEditCommentForm('.$data->id.',"'.$formattedContent.'")',
						));
					}
				?>
				<br />
			</td>
		</tr>
	</table>
</div>