<?php
/* @var $this InfonesiaController */
/* @var $data Infonesia */
?>

<div class="view">

        <b><h4><?php echo CHtml::link(CHtml::encode($data->namadaerah), array('/infonesia/view', 'id'=>$data->namadaerah)); ?></h4></b>
	<br />
        <img src="<?php echo Yii::app()->request->baseUrl.'/images/infonesia/'.$data->namadaerah.'/'.$data->urlpics[0]->urlpic?>" width="200" height="100"/>
         
        <br />
	
</div>