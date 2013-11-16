<?php
/* @var $this InfonesiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Infonesia',
);
?>

<h1>Daftar Infonesia</h1>

<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
