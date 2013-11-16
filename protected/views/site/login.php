<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<h5>Silahkan isi dengan username dan password Anda:</h5>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Isian dengan <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
	<?php echo $form->error($model,'username'); ?>	

	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
	<?php echo $form->error($model,'password'); ?>	

	<p> <?php echo CHtml::link('Lupa Password?', array('/pengguna/lupa'));?></p>
	<p> Belum punya akun? <?php echo CHtml::link('Daftar!', array('/pengguna/create'));?> </p>
	
	<?php echo $form->checkboxRow($model, 'rememberMe'); ?>	
	<?php echo $form->error($model,'rememberMe'); ?>
	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Login')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
