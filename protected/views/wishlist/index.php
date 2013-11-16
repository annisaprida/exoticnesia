<?php
/* @var $this WishlistController */
/* @var $dataProvider CActiveDataProvider */
	$this->breadcrumbs=array(
		'Daftar Wishlist',
	);
?>

<h1>Daftar Wishlist</h1>

<?php
	$dataProvider = new CActiveDataProvider('Wishlistmanager',array(
	'pagination'=>array('pageSize'=>10),
	));
?>

<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
       'dataProvider'=>$dataProvider,
       'itemView'=>'/pengguna/wishlistView',
       'htmlOptions'=>array('style'=>'margin-left:30px;'),
	)); 
?>

<div style="clear:both;margin-bottom:40px;"></div>