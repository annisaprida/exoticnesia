<div class="view" style="" align="center">
	<?php 
		$infonesia = $data->namadaerah0;
		echo CHtml::image(Yii::app()->baseUrl.'/images/infonesia/'.$data->namadaerah.'/'.$infonesia->urlpics[0]->urlpic,'alt',array('width'=>150,'height'=>150, 'style'=>'border:2px double;'));
	?>
		<br/>
	<?php
		echo $data->namadaerah;
	?>
</div>