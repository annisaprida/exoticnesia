<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Forum')
));
?>
</div>
<div id="content" style="margin-bottom:20px">
    <h1> Forum </h1>

    <?php

    if(!Yii::app()->user->isGuest && Yii::app()->user->isAdmin())
    {
        echo 'Admin: '. CHtml::link('New forum', array('/forum/forum/create')) .'<br />';
    }

    foreach($categories as $category)
    {
        $this->renderpartial('_subforums', array(
            'forum'=>$category,
            'subforums'=>new CActiveDataProvider('Forum', array(
                'criteria'=>array(
                    'scopes'=>array('forums'=>array($category->id)),
                ),
                'pagination'=>false,
            )),
        ));
    }
    ?>
</div>