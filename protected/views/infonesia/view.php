<?php
/* @var $this InfonesiaController */

$this->breadcrumbs=array(
	'Infonesia'=>array('index'),
	$model->namadaerah,
);
$this->pageTitle=Yii::app()->name . ' - Infonesia : ' . $model->namadaerah;

?>

<h1><?php echo $model->namadaerah; ?></h1>

<div id="carousel" style="border:5px solid #141414;">
    <?php 
        $this->widget('bootstrap.widgets.TbCarousel', array(
        'items'=>array(
            array(
                'image'=>Yii::app()->request->baseUrl.'/images/infonesia/'.$model->namadaerah.'/'.$urlpic[0]->urlpic,),
            array(
                'image'=>Yii::app()->request->baseUrl.'/images/infonesia/'.$model->namadaerah.'/'.$urlpic[1]->urlpic,),
            array(
                'image'=>Yii::app()->request->baseUrl.'/images/infonesia/'.$model->namadaerah.'/'.$urlpic[2]->urlpic,),
            array(
                'image'=>Yii::app()->request->baseUrl.'/images/infonesia/'.$model->namadaerah.'/'.$urlpic[3]->urlpic,),
            array(
                'image'=>Yii::app()->request->baseUrl.'/images/infonesia/'.$model->namadaerah.'/'.$urlpic[4]->urlpic,),
            ),
        ));
    ?>
</div>

<?php if(Yii::app()->user->hasFlash('wishlistSubmitted')){ ?>
<div class="flash-success">
     <?php echo Yii::app()->user->getFlash('wishlistSubmitted'); }?>
</div>

<div style='float:left;margin-bottom:10px;'>
    <?php
        $this->widget('bootstrap.widgets.TbButton',array(
                'url'=>'#',
                'type'=>'primary',
                'size'=>'small',
                'label'=>'Add to wishlist',
                'htmlOptions'=>array('submit'=>array('container','namadaerah'=>$model->namadaerah))
                ));
    ?>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'namadaerah',
		'deskripsi',
		'kendaraan',
	),
)); ?>

<h3>Restoran</h3>
    <?php $this->renderPartial('_tempatmakan',array(
             'data'=>$model->tempatmakans,
             'dataProvider'=>$tempatmakan,
        ));
    ?>
<h3>Penginapan</h3>
    <?php $this->renderPartial('_penginapan',array(
             'data'=>$model->penginapans,
             'dataProvider'=>$penginapan,
        ));
    ?>

<div class="rating">
    <?php
        $this->widget('CStarRating',array(
            'name'=>'rating',
            'maxRating' => 5,
            'minRating' => 1,
            'allowEmpty' => false,
            'readOnly' => false,

            'callback'=>'
            function(){
                    $.ajax({
                    type: "POST",
                    url: "'.Yii::app()->createUrl('infonesia/rating').'",
                    data: "id='.$model->namadaerah.'&rate=" + $(this).val(),
                    success: function(msg){
                    $("#rating > input").rating("readOnly", true);
                    document.location.reload(true);
                    }})}'
             ));
        
    ?>
    <?php echo $rating."/5";?>
</div>


<div id="comments">
    <h3>Leave a Review</h3>

    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>

        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>

    <?php else: ?>
        <?php $this->renderPartial('/review/_form',array(
            'infonesia'=>$model,
            'model'=>$review,
        )); ?>
    
    <?php endif; ?>

    <?php if(Yii::app()->user->hasFlash('commentDeleted')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('commentDeleted'); ?>
    </div>

    <?php endif; ?>

    <?php $this->renderPartial('_review',array(
            'data'=>$review,
            'model'=>$model
        ));
    ?>


</div>


