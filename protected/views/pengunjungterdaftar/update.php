<?php
/* @var $this PengunjungterdaftarController */
/* @var $model Pengunjungterdaftar */

$this->breadcrumbs=array(
	'Pengunjungterdaftars'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengunjungterdaftar', 'url'=>array('index')),
	array('label'=>'Create Pengunjungterdaftar', 'url'=>array('create')),
	array('label'=>'View Pengunjungterdaftar', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage Pengunjungterdaftar', 'url'=>array('admin')),
);
?>

<h1>Update Pengunjungterdaftar <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>