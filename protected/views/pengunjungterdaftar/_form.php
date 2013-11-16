<?php
/* @var $this PengunjungterdaftarController */
/* @var $model Pengunjungterdaftar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengunjungterdaftar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($pt); ?>

	<div class="row">
		<?php echo $form->labelEx($pt,'username'); ?>
		<?php echo $form->textField($pt,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($pt,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($pt,'password'); ?>
		<?php echo $form->passwordField($pt,'password',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($pt,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($pt,'email'); ?>
		<?php echo $form->textField($pt,'email',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($pt,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($profil,'nama'); ?>
		<?php echo $form->textField($profil,'nama',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($profil,'nama'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($pt->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->