<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */
/* @var $form CActiveForm */
?>

<?php
/* 
*	Mengubah form agar bisa menampilkan pesan error untuk keseluruhan field yang ebrsigat required
*	Menghilangkan duplikasi pesan error 
*/
?>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'infonesia-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($item1); ?>
	<?php echo $form->errorSummary($item2); ?>
	<?php echo $form->errorSummary($item3); ?>
	<?php echo $form->errorSummary($item4); ?>
	<?php echo $form->errorSummary($item5); ?>
	<?php echo $form->errorSummary($place); ?>
	<?php echo $form->errorSummary($resto); ?>

	<div class="row">
		<?php echo $form->textFieldRow($model,'namadaerah',array('size'=>100,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->markdownEditorRow($model, 'deskripsi', array('height'=>'200px'));?>
	</div>
	
	<div class="row">

        <div id="imageHP">
            <?php
            $countPic = 5;
            $iPic = 0;
            do {
                ?> 
                <div class="image_pick">
					<?php if($iPic == 0){ 
						echo $form->fileFieldRow($item1, '[' . $iPic . ']gambar_daerah');
					}else if($iPic == 1){ 
                    echo $form->fileFieldRow($item2, '[' . $iPic . ']gambar_daerah');
					}else if($iPic == 2){
                    echo $form->fileFieldRow($item3, '[' . $iPic . ']gambar_daerah');
					}else if($iPic == 3) {
                    echo $form->fileFieldRow($item4, '[' . $iPic . ']gambar_daerah');
					}else if($iPic == 4){
                    echo $form->fileFieldRow($item5, '[' . $iPic . ']gambar_daerah');}?>
                </div>

                <?php
                $iPic+=1;
            } while ($iPic < $countPic);
            ?> 
        </div>

        
    </div>
	<div class="row">
		<?php echo $form->textAreaRow($model,'kendaraan',array('rows'=>10, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaRow($place,'penginapan',array('rows'=>10, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaRow($resto,'tempatmakan',array('rows'=>10, 'cols'=>150)); ?>
	</div>
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>
   	</div>
<?php $this->endWidget(); ?>

</div>