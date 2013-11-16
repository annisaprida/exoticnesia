<?php
/* @var $this InfonesiaController */
/* @var $data Infonesia */
	$this->pageTitle=Yii::app()->name . ' - Infonesia';
?>

<div class="view">

	<?php $img = CHtml::image(Yii::app()->request->baseUrl.'/images/infonesia/'.$data->namadaerah.'/'.$data->urlpics[0]->urlpic,'',
		array('width'=>'200px', 'height'=>'200px', 'style'=>'border:1px solid;')
		); 
	?>
	<?php echo CHtml::link($img, array('view', 'id'=>$data->namadaerah)); ?>
	<br/>
	<b><?php echo CHtml::encode($data->getAttributeLabel('namadaerah')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->namadaerah), array('view', 'id'=>$data->namadaerah)); ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('kendaraan')); ?>:</b>
	<?php echo CHtml::encode($data->kendaraan); ?>
	<br />


</div>