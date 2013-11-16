<?php
/* @var $this WishlistController */
/* @var $data Wishlist */
?>

<div class="view">

	<h2>
		<?php echo CHtml::link($data->username0->profils->nama, array('/pengguna/view', 'id'=>$data->username0->profils->username)); ?>
	</h2>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<img src="<?php echo Yii::app()->request->baseUrl.'/images/wishlist/'.$data->url?>" width="250" height="150"/>
	<br />

</div>