<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
    <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array('links'=>$thread->getBreadcrumbs())); ?>
</div>
<?php
    $header = '<div class="preheader" style="text-align:left;"><div class="preheaderinner"><b>'. CHtml::encode($thread->subject) .'</b></div></div>';
    $footer = $thread->is_locked?'':'<div class="footer">'. CHtml::link(CHtml::image(Yii::app()->controller->module->registerImage("newreply.gif")), array('/forum/thread/newreply', 'id'=>$thread->id)) .'</div>';
?>

<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="flash-success" style="margin-top:25px;margin-left:20px;">
    <?php echo Yii::app()->user->getFlash('success'); ?>       
</div>

<?php endif; ?>
<?php
    $this->widget('bootstrap.widgets.TbListView', array(
        //'htmlOptions'=>array('class'=>'thread-view'),
        'dataProvider'=>$postsProvider,
        'template'=>'{summary}{pager}'. $header .'{items}{pager}'. $footer,
        'itemView'=>'_post',
        'htmlOptions'=>array(
            'class'=>Yii::app()->controller->module->forumListviewClass,
        ),
    ));
?>
