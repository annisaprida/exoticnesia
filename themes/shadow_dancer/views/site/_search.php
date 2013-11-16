<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'searchForm',
	'type'=>'search',
	'htmlOptions'=>array('class'=>'well'),
)); ?>
<?php
	echo $form->textFieldRow($model, 'namadaerah',
		array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>'));
?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Cari')); ?>
 
<?php $this->endWidget(); ?>