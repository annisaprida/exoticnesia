<?php
/* @var $this AdminController */
/* @var $data Admin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isAktif')); ?>:</b>
	<?php echo CHtml::encode($data->isAktif); ?>
	<br />


</div>