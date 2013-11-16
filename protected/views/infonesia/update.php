<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */

$this->breadcrumbs=array(
	'Infonesias'=>array('index'),
	$model->namadaerah=>array('view','id'=>$model->namadaerah),
	'Update',
);

$this->menu=array(
	array('label'=>'List Infonesia', 'url'=>array('index')),
	array('label'=>'Create Infonesia', 'url'=>array('create')),
	array('label'=>'View Infonesia', 'url'=>array('view', 'id'=>$model->namadaerah)),
	array('label'=>'Manage Infonesia', 'url'=>array('admin')),
);
?>

<h1>Update Infonesia <?php echo $model->namadaerah; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>