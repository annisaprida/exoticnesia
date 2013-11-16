<?php
/* @var $this PenggunaController */
/* @var $data Pengguna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->username)); ?>
	<br />
 	 
	<b><?php echo CHtml::encode($data->getAttributeLabel('kodeDaftar')); ?>:</b>
	<?php echo CHtml::encode($data->kodeDaftar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isAktif')); ?>:</b>
	<?php echo CHtml::encode($data->isAktif); ?>
	<br />


</div>