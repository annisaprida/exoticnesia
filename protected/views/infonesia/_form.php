<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'infonesia-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<!-- <?php echo $form->labelEx($model,'nama_daerah'); ?> -->
		<?php echo $form->textFieldRow($model,'namadaerah',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'namadaerah'); ?>
	</div>

	<div class="row">
	<!-- 	<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50)); ?> -->
		<?php echo $form->error($model,'deskripsi'); ?>
		<?php echo $form->markdownEditorRow($model, 'deskripsi', array('height'=>'200px'));?>
	</div>
	
	<div class="row">

        <div id="imageHP">
            <!-- <?php echo $form->labelEx(Urlpic::model(), 'gambar_daerah'); ?> -->
            <?php
            $countPic = 5;
            $iPic = 0;
            do {
                ?> 
                <div class="image_pick">
                    <?php
                    
                        echo $form->fileFieldRow(Urlpic::model(), '[' . $iPic . ']gambar_daerah');

                    //echo CHtml::listData(), 'ColID', 'Value');
                    ?>
                    
                </div>

                <?php
                $iPic+=1;
            } while ($iPic < $countPic);
            ?> 
        </div>

        
    </div>
    
    <!--
	<div class="row">
		<div id="imageDaerah">
            <?php echo $form->labelEx(Urlpic::model(), 'gambar_daerah'); ?>
            <h6> File tidak boleh kosong </h6>
            <div>
            	<?php echo $form->fileField(Urlpic::model(), '[0]gambar_daerah');?>
            	<?php echo $form->error(Urlpic::model(),'[0]gambar_daerah'); ?>
            </div>
            <div>
            	<?php echo $form->fileField(Urlpic::model(), '[1]gambar_daerah');?>
				<?php echo $form->error(Urlpic::model(),'[1]gambar_daerah'); ?>
			</div>
			<div>
	            <?php echo $form->fileField(Urlpic::model(), '[2]gambar_daerah');?>
	            <?php echo $form->error(Urlpic::model(),'[2]gambar_daerah'); ?>
            </div>
            <div>
	            <?php echo $form->fileField(Urlpic::model(), '[3]gambar_daerah');?>
	            <?php echo $form->error(Urlpic::model(),'[3]gambar_daerah'); ?>
	        </div>
	        <div>
	            <?php echo $form->fileField(Urlpic::model(), '[4]gambar_daerah');?>
	            <?php echo $form->error(Urlpic::model(),'[4]gambar_daerah'); ?>
	        </div>
        </div>
	</div> -->
	<!--
	<div class="row">
       <?php echo $form->labelEx(Urlpic::model(),'gambar_daerah'); ?>
       <?php $this->widget('CMultiFileUpload',array(
           'name'=>'gambar_daerah',
           'accept'=>'jpg|png',
           'max'=>5,
           'remove'=>Yii::t('ui','Remove'),
           'denied'=>'type is not allowed', //message that is displayed when a file type is not allowed
           'duplicate'=>'file appears twice', //message that is displayed when a file appears twice
           'htmlOptions'=>array('size'=>25),
       )); ?>
       <?php echo $form->error($model,'product_images'); ?>
   </div>-->
	<div class="row">
		<!-- <?php echo $form->labelEx($model,'kendaraan'); ?> -->
		<?php echo $form->textAreaRow($model,'kendaraan',array('rows'=>10, 'cols'=>50)); ?>
		<?php echo $form->error($model,'kendaraan'); ?>
	</div>

	<div class="row">
		<!-- <?php echo $form->labelEx(Penginapan::model(),'penginapan'); ?> -->
		<?php echo $form->textAreaRow(Penginapan::model(),'penginapan',array('rows'=>10, 'cols'=>50)); ?>
		<?php echo $form->error(Penginapan::model(),'penginapan'); ?>
	</div>

	<div class="row">
		<!-- <?php echo $form->labelEx(Tempatmakan::model(),'tempatmakan'); ?> -->
		<?php echo $form->textAreaRow(Tempatmakan::model(),'tempatmakan',array('rows'=>10, 'cols'=>150)); ?>
		<?php echo $form->error(Tempatmakan::model(),'tempatmakan'); ?>
	</div>

	<!-- <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div> -->
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>
   	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->