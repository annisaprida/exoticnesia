<?php
	$this->pageTitle=Yii::app()->name . ' - Lupa Password';
	$this->breadcrumbs=array(
		'Lupa Password',
	);
?>

<h1>Lupa Password</h1>

<br/>
<p>Masukkan alamat e-mail pendaftaran anda untuk meminta Password:</p>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'lupaPassword',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Kirim Password'); ?>
		</div>

	<?php $this->endWidget(); ?>

	<?php if(Yii::app()->user->hasFlash('error')): ?>

	<div class="flash-error">
    <?php echo Yii::app()->user->getFlash('error'); ?>
	</div>

	<?php endif; ?>
</div><!-- form -->
