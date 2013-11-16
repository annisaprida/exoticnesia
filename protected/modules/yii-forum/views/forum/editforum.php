<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
    <?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=>array_merge(
            $model->getBreadcrumbs(!$model->isNewRecord),
            array($model->isNewRecord?'New forum':'Edit')
        )
    ));
    ?>
</div>
<div class="form" style="margin:20px;">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',
                                array (
                                    'id'=>'horizontalForm',
                                    'type'=>'horizontal',
                                )
                            ); 
?>
    
    <h1> New Forum </h1>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <br/>
    <div class="row">
        <!-- <?php echo $form->labelEx($model,'parent_id'); ?> -->
        <?php echo $form->dropDownListRow($model, 'parent_id', CHtml::listData(
                Forum::model()->findAll(),
                'id', 'title'), array('empty'=>'None (root)')); ?>
       <!--  <?php echo CHtml::activeDropDownList($model, 'parent_id', CHtml::listData(
                Forum::model()->findAll(),
                'id', 'title'
            ), array('empty'=>'None (root)')); ?> -->
        <?php echo $form->error($model,'parent_id'); ?>
    </div>

    <div class="row">
        <!-- <?php echo $form->labelEx($model,'title'); ?> -->
        <?php echo $form->textFieldRow($model,'title'); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <!-- <?php echo $form->labelEx($model,'description'); ?> -->
        <?php echo $form->markdownEditorRow($model, 'description', array('height'=>'200px'));?>
        <!-- <?php echo $form->textArea($model,'description',array('rows'=>10, 'cols'=>70)); ?> -->
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <!-- <?php echo $form->labelEx($model,'listorder'); ?> -->
        <?php echo $form->textFieldRow($model,'listorder'); ?>
        <?php echo $form->error($model,'listorder'); ?>
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
                                                            'label'=>
                                                            $model->isNewRecord? 'Create' : 'Save' 
        )); ?>
        <!-- <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?> -->
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
