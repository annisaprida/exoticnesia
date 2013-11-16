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
?>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div style="padding:10px">
	<?php echo $form->errorSummary($model, $pt, $profil); ?>

		<?php echo $form->textFieldRow($pt,'email',array(
													'size'=>40,
													'maxlength'=>40,
												)); ?>



		<?php echo $form->textFieldRow($profil,'nama',array(
													'size'=>40,
													'maxlength'=>40,
													'hint'=>
													'',
													)); ?>
											
		<?php echo $form->fileFieldRow($profil,'avatar',array(
														'size'=>50,
														'maxlength'=>50,
														'hint'=>
														'Hint: Tipe gambar: .jpg/.png',
														)); ?>												

		<?php echo $form->textFieldRow($profil,'contact',array('size'=>15,'maxlength'=>15)); ?>


		<?php echo $form->radioButtonListRow($profil,'sex',array('Male'=>'Male', 'Female'=>'Female'),array('separator'=>' ')); ?>
		</div>

	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
        														'type'=>'primary', 
        														'label'=> 'Save',
        														)
        												); ?>
        <?php echo CHtml::Button('Cancel',array('onClick'=> 'js:history.go(-1);returnFalse;')); ?>
    </div>

<?php $this->endWidget(); ?>