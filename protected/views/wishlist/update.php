<?php
/* @var $this WishlistController */
/* @var $model Wishlist */

$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	$model->id0->nama=>array('view','id'=>$model->id, ),
	'Edit Nama Wishlist',
);
?>

<h4>Masukkan nama wishlist yang anda inginkan</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'wlm'=>$wlm)); ?>
