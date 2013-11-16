<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
$this->pageTitle=Yii::app()->name . ' - Profil';
$this->breadcrumbs=array(
	'Profil',
	$model->username,
);

if(Yii::app()->user->id == $model->username) {
	$this->menu=array(
		array('label'=>'Edit Profil', 'url'=>array('update', 'id'=>$model->username)),
		array('label'=>'Create Wishlist', 'url'=>array('viewwishlist', 'id'=>$model->username)),
	);
}
?>


<?php 
	foreach(Yii::app()->user->getFlashes() as $key => $message){
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n"; 
	}
?>		

<h1><?php echo $model->profils->nama; ?></h1>

<?php if($model->profils->avatar != null) {
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'label'=>'Avatar',
				'type'=> 'raw',
				'value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/pengguna/' .$model->username . '/avatar' . '/'.$model->profils->avatar,'alt',array('width'=>150,'height'=>150))) ,
			),
			'username',
			'profils.nama',	
			'username0.email',
			'profils.contact',
			'profils.sex',
		),
	));
}
else {
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'label'=>'Avatar',
				'type'=> 'raw',
				'value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/pengguna/' . 'default-avatar.jpg','alt',array('width'=>150,'height'=>150))) ,
			),
			'username',
			'profils.nama',	
			'username0.email',
			'profils.contact',
			'profils.sex',
		),
	));			
}
?>
<br/>

<div class="wishlist">
	<?php $this->renderPartial('_wishlistView',array(
            'data'=>$wishlist,
            'model'=>$model
        ));
    ?>
</div>
<div style="clear:both;"></div>

<div class="gallery">
	<?php $this->renderPartial('_galleryView',array(
            'data'=>$foto,
            'model'=>$model
        ));
    ?>
    <div style="clear:both;"></div>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'foto-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php if(Yii::app()->user->id == $model->username) {?>
<br/>
<div class="row">
		<div id="foto" align = "center">
            <?php echo $form->fileFieldRow(Foto::model(), 'foto');?>
           	<?php echo $form->error(Foto::model(),'foto'); ?>
        </div>
        <div class="row buttons" align = "center">
			<?php echo CHtml::submitButton('Upload',array('id'=>'/pengguna/view')); ?>
		</div>
</div> 
<?php } ?>
<?php $this->endWidget(); ?>

