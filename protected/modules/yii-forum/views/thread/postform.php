<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
    <?php
        if(isset($forum)) $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>array_merge(
                $forum->getBreadcrumbs(true),
                array('New thread')
            ),
        ));
        else $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>array_merge(
                $thread->getBreadcrumbs(true),
                array('New reply')
            ),
        ));
    ?>
</div>
<div class="form" style="margin:20px;">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'post-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
	),
    )); ?>

    <?php if(isset($forum)): ?>
        <div class="row">
            <!-- <?php echo $form->labelEx($model,'subject'); ?> -->
            <?php echo $form->textFieldRow($model,'subject'); ?>
            <?php echo $form->error($model,'subject'); ?>
        </div>
    <?php endif; ?>

        <div class="row">
            <!-- <?php echo $form->labelEx($model,'content'); ?> -->
            <!-- <?php echo $form->textArea($model,'content', array('rows'=>10, 'cols'=>70)); ?> -->
            <?php echo $form->markdownEditorRow($model, 'content', array('height'=>'200px'));?>
            <?php echo $form->error($model,'content'); ?>
        </div>

    <?php if(Yii::app()->user->isAdmin()): ?>
        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'lockthread', array('uncheckValue'=>0)); ?>
            <?php echo $form->labelEx($model,'lockthread'); ?>
            <?php // echo $form->error($model,'lockthread'); ?>
        </div>
    <?php endif; ?>

       <!--  <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div> -->
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array (
                                                                'buttonType'=>'submit',
                                                                'type'=>'primary',
                                                                'label'=> 'Submit',
            )); ?>    
        </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
