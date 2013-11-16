<?php
/* @var $this PenggunaController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle=Yii::app()->name . ' - Create Wishlist';
$this->breadcrumbs=array(
	'Wishlist',
);
?>

<h1>Wishlist</h1>

<?php 
        foreach(Yii::app()->user->getFlashes() as $key => $message){
                echo '<div class="flash-' . $key . '">' . $message . "</div>\n"; 
        }
?>

<?php echo CHtml::beginForm($action= $this->createUrl('createwishlist',array('r'=>'pengguna/createWishlist'))); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_createwishlist',
	'emptyText' => 'No Infonesia found',
));
?>
 
<!--   <?php echo CHtml::submitButton('/pengguna/createWishlist',array('value'=>'Create Wishlist')); ?> -->
<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
        														'type'=>'primary', 
        														'label'=>
        														'Create Wishlist',
        														'htmlOptions'=>array('submit'=>array('/pengguna/createWishlist')),
        														)
        												); ?>
</div>
<?php echo CHtml::endForm(); ?>