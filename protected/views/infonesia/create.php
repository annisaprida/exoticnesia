<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */

$this->breadcrumbs=array(
	'Infonesia'=>array('index'),
	'Create',
);

?>

<h1>Create Infonesia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'item1'=>$item1, 'item2'=>$item2, 'item3'=>$item3, 'item4'=>$item4, 'item5'=>$item5,'place'=>$place,'resto'=>$resto,)); ?>