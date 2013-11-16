<?php
/* @var $this PengunjungterdaftarController */
/* @var $model Pengunjungterdaftar */

$this->breadcrumbs=array(
	'Pengunjungterdaftars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengunjungterdaftar', 'url'=>array('index')),
	array('label'=>'Manage Pengunjungterdaftar', 'url'=>array('admin')),
);
?>

<h1>Create Pengunjungterdaftar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>