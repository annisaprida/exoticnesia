<?php
// For admins, add link to delete post
$isAdmin = !Yii::app()->user->isGuest && Yii::app()->user->isAdmin();
?>

<div class="post" style="background: #F8F8F8;border:1px solid">
    <div class="header" style="color:white;">
        <?php if($data->authorUsername === 'admin'): ?>
            <?php echo Yii::app()->controller->module->format_date($data->created, 'long'); ?> by admin
        <?php else: ?>
            <?php echo Yii::app()->controller->module->format_date($data->created, 'long'); ?> by <?php echo CHtml::link(CHtml::encode($data->authorUsername), array('/pengguna/view', 'id'=>$data->authorUsername)); ?>

        <?php endif; ?>
        <?php if($data->editor) echo ' (Modified: '. Yii::app()->controller->module->format_date($data->updated, 'long') .' by '. CHtml::link(CHtml::encode($data->editorUsername), array('pengguna/view', 'id'=>$data->editorUsername)) .')'; ?>
    </div>
    
    <div class="content" style="border-top:1px solid;">
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $data->content;
            $this->endWidget();

            if($data->author->signature)
            {
                echo '<br />---<br />';
                $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                    echo $data->author->signature;
                $this->endWidget();
            }
        ?>
    </div>
<?php if($data->id !== $data->thread->first_post) : ?>
    <div class="footer" style="border-top:1px dotted;">
       
            <?php if(Yii::app()->user->id == $data->authorUsername): ?>
            <div style="float:right;border:none">
                <?php echo CHtml::link(CHtml::image(Yii::app()->controller->module->registerImage("postbit_edit.gif")), array('/forum/post/update', 'id'=>$data->id)); ?>
            </div>
            <?php endif; ?>        
            <div class="admin" style="float:right; border:none;">
            <?php if($isAdmin || Yii::app()->user->id == $data->authorUsername):?>
                <?php
                    $deleteConfirm = "Are you sure? This post will be permanently deleted!";
                    echo CHtml::ajaxLink(CHtml::image(Yii::app()->controller->module->registerImage("pm_delete.gif")),
                                array('/forum/post/delete', 'id'=>$data->id),
                                array('type'=>'POST', 'success'=>'function(){document.location.reload(true);}'),
                                array('confirm'=>$deleteConfirm, 'id'=>'post'.$data->id)
                            );
                ?>
            <?php endif; ?>
            </div>
    </div>
<?php endif; ?>
    <br/>
</div>
