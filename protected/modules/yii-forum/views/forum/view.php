<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
    <?php
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=>$forum->getBreadcrumbs(),
    ));
    ?>
</div>

<!-- // $this->renderPartial('_subforums', array(
//     'inforum'=>true,
//     'forum' => $forum,
//     'subforums' => $subforumsProvider,
// ));
 -->

<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="flash-success" style="margin-top:25px;margin-left:20px;">
    <?php echo Yii::app()->user->getFlash('success'); ?>       
</div>

<?php endif; ?>
<br/>
<?php 
$newthread = $forum->is_locked?'':'<div class="newthread" style="float:right;">'. CHtml::link(CHtml::image(Yii::app()->controller->module->registerImage("newthread.gif")), array('/forum/thread/create', 'id'=>$forum->id)) .'</div>';

$gridColumns = array(
    array(
        'name' => 'Thread / Author',
        'headerHtmlOptions' => array('colspan' => '2'),
        'type' => 'html',
        'value' => 'CHtml::image(Yii::app()->controller->module->registerImage("folder". ($data->is_locked?"locked":"") .".gif"), ($data->is_locked?"Locked":"Unlocked"), array("title"=>$data->is_locked?"Thread locked":"Thread unlocked"))',
        'htmlOptions' => array('style' => 'width:20px;'),
    ),
    array(
        'name' => 'subject',
        'headerHtmlOptions' => array('style' => 'display:none'),
        'type' => 'html',
        'value' =>'$data->renderSubjectCell()',
    ),
    array(
        'name' => 'postCount',
        'header' => 'Posts',
        'headerHtmlOptions' => array('style' => 'text-align:center;'),
        'htmlOptions' => array('style' => 'width:65px; text-align:center;'),
    ),
    array(
        'name' => 'view_count',
        'header' => 'Views',
        'headerHtmlOptions' => array('style' => 'text-align:center;'),
        'htmlOptions' => array('style' => 'width:65px; text-align:center;'),
    ),
    array(
        'name' => 'Last post',
        'headerHtmlOptions' => array('style' => 'text-align:center;'),
        'type' => 'html',
        'value' => '$data->renderLastpostCell()',
        'htmlOptions' => array('style' => 'width:200px; text-align:right; padding-right:10px;'),
    ),
);

// For admins, add column to delete and lock/unlock threads
$isAdmin = !Yii::app()->user->isGuest && Yii::app()->user->isAdmin();
if($isAdmin)
{
    // Admin links to show in extra column
    $deleteConfirm = "Are you sure? All posts are permanently deleted as well!";
    $gridColumns[] = array(
        'class'=>'CButtonColumn',
        'header'=>'Admin',
        'template'=>'{delete}{update}',
        'deleteConfirmation'=>"js:'".$deleteConfirm."'",
        'afterDelete'=>'function(){document.location.reload(true);}',
        'buttons'=>array(
            'delete'=>array('url'=>'Yii::app()->createUrl("/forum/thread/delete", array("id"=>$data->id))'),
            'update'=>array('url'=>'Yii::app()->createUrl("/forum/thread/update", array("id"=>$data->id))'),
        ),
        'htmlOptions' => array('style' => 'width:40px;'),
    );
}

$this->widget('forum.extensions.groupgridview.GroupGridView', array(
    'enableSorting' => false,
    'selectableRows' => 0,
    'emptyText'=>'No thread found.', // No threads? Show nothing
    'preHeader' => CHtml::encode($forum->title),
    'preHeaderHtmlOptions' => array(
        'class' => 'preheader',
    ),
    'dataProvider' => $threadsProvider,
    'template'=>'{summary}'. $newthread .'{pager}{items}{pager}'. $newthread,
    'extraRowColumns' => array('is_sticky'),
    'extraRowExpression' => '"<b>".($data->is_sticky?"Sticky threads":"Normal threads")."</b>"',
    'columns' => $gridColumns,
    'htmlOptions'=>array(
        'class'=>Yii::app()->controller->module->forumTableClass,
    )
));
?>

<br/>

