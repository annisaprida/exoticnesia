<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
    <?php
        $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>array_merge(
                $model->getBreadcrumbs(true),
                array('Edit')
            ),
        ));
    ?>
</div>
<div class="form" style="margin:20px;">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'thread-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
	),
    )); ?>

        <div class="row">
            <!-- <?php echo $form->labelEx($model,'subject'); ?> -->
            <?php echo $form->textFieldRow($model,'subject'); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'is_sticky',array('uncheckValue'=>0)); ?>
            <?php echo $form->labelEx($model,'is_sticky'); ?>
            <?php // echo $form->error($model,'lockthread'); ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'is_locked',array('uncheckValue'=>0)); ?>
            <?php echo $form->labelEx($model,'is_locked'); ?>
            <?php // echo $form->error($model,'lockthread'); ?>
        </div>

        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array (
                                                                'buttonType'=>'submit',
                                                                'type'=>'primary',
                                                                'label'=> 'Submit',
            )); ?>    
        </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
