<?php
/* @var $this PengunjungterdaftarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pengunjungterdaftars',
);

$this->menu=array(
	array('label'=>'Create Pengunjungterdaftar', 'url'=>array('create')),
	array('label'=>'Manage Pengunjungterdaftar', 'url'=>array('admin')),
);
?>

<h1>Pengunjungterdaftars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
