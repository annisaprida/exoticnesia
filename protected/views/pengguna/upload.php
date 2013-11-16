

<?php if(Yii::app()->user->id == $model->username) {?>
<br/>
<div class="row">
		<div id="foto" align = "center">
            <!-- <?php echo $form->labelEx(Foto::model(), 'Foto'); ?> -->
            <?php echo $form->fileFieldRow(Foto::model(), 'foto');?>
           	<?php echo $form->error(Foto::model(),'foto'); ?>
        </div>
        <div class="row buttons" align = "center">
			<?php echo CHtml::submitButton('Upload',array('id'=>'/pengguna/view')); ?>
		</div>
</div> 
<?php } ?>
<?php $this->endWidget(); ?>

