<?php
/* @var $this PengunjungterdaftarController */
/* @var $model Pengunjungterdaftar */

$this->breadcrumbs=array(
	'Pengunjungterdaftars'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Pengunjungterdaftar', 'url'=>array('index')),
	array('label'=>'Create Pengunjungterdaftar', 'url'=>array('create')),
	array('label'=>'Update Pengunjungterdaftar', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Delete Pengunjungterdaftar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengunjungterdaftar', 'url'=>array('admin')),
);
?>

<h1>View Pengunjungterdaftar #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'email',
	),
)); ?>
