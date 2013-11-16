<?php
$this->pageTitle=Yii::app()->name . ' - Search';
$this->breadcrumbs=array(
        'Cari Infonesia',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
});
$('.search-form form').submit(function(){
         $.fn.yiiListView.update('InfonesiaListview', { //this section is taken from admin.php. w/only this line diff
                data: $(this).serialize()
        });
        return false;
});
");
?>

<h1>Cari Infonesia</h1>


<div class="search-form" >
<?php  $this->renderPartial('_search',array(
        'model'=>$model,
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbListView', array(
       'dataProvider'=>$dataProvider,
       'itemView'=>'_view',
       'id'=>'InfonesiaListview',             //must have id corresponding to js above
       
)); 
?>