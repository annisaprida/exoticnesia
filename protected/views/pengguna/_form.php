<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pengguna-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
	$actionId = $this->action->id;

?>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div style="padding:10px">
	<?php echo $form->errorSummary($model, $pt, $profil); ?>

		<?php echo $form->textFieldRow($pt,'username',array(
														'size'=>20,
														'maxlength'=>20,
														'disabled'=>!$model->isNewRecord,
														'hint'=>
														'Hint: Username menggunakan huruf non-kapital minimal 5 huruf, terdiri dari huruf, angka, atau "_"',
														)); ?>


		<?php echo $form->passwordFieldRow($pt,'password',array(
														'size'=>20,
														'maxlength'=>20,
														'disabled'=>!$model->isNewRecord,
														'hint'=>
														'Hint: Password minimal 6 huruf, terdiri dari huruf atau angka',
														)); ?>

		<?php echo $form->textFieldRow($pt,'email',array(
													'size'=>40,
													'maxlength'=>40,
												)); ?>



		<?php echo $form->textFieldRow($profil,'nama',array(
													'size'=>40,
													'maxlength'=>40,
													)); ?>

	
		<?php if(!$model->isNewRecord) : ?>													
			<?php echo $form->fileFieldRow($profil,'avatar',array(
															'size'=>50,
															'maxlength'=>50,
															'hint'=>
															'Hint: Tipe gambar: .jpg/.png',
															)); ?>
		<?php endif; ?>												


		<?php echo $form->textFieldRow($profil,'contact',array('size'=>15,'maxlength'=>15)); ?>


		<?php echo $form->radioButtonListRow($profil,'sex',array('Male'=>'Male', 'Female'=>'Female'),array('separator'=>' ')); ?>
		</div>

<!-- 	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Daftar' : 'Save'); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=> 'js:history.go(-1);returnFalse;')); ?>
	</div> -->

	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
        														'type'=>'primary', 
        														'label'=>
        														$model->isNewRecord ? 'Daftar' : 'Save'
        														)
        												); ?>
        <?php echo CHtml::Button('Cancel',array('onClick'=> 'js:history.go(-1);returnFalse;')); ?>
    </div>

<?php $this->endWidget(); ?>