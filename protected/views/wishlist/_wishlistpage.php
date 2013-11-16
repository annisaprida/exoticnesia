<div class="view">

<!-- 	<b style="font-size:20px;">Wishlist:</b>
	<?php echo CHtml::encode($data->id0->nama); ?>
	<br/> -->
	<br />
	<div style="text-align:center;">
	<?php $infonesia = $data->namadaerah0; ?>
	<?php echo CHtml::image(Yii::app()->baseUrl.'/images/infonesia/'.$data->namadaerah.'/'.$infonesia->urlpics[0]->urlpic,'alt',array('width'=>400,'height'=>400, 'style'=>'border:2px solid;')); ?>
	<br/>
	<br/>
	<b> <?php echo $data->namadaerah; ?></b>
	</div>
	<br />

</div>