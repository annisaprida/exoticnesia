<?php
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'review-form',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
 <div class="row">
		<?php echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>100,)); ?>
		<?php echo $form->error($model,'isi'); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'buttonType'=>'submit', 
	'label'=>'Save',
	'htmlOptions'=>array('submit'=>array('view','id'=>$infonesia->namadaerah)))); 
?>
 
<?php $this->endWidget(); ?>
</div><!-- form -->