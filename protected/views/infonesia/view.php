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
        $totalRating = $model->getTotalRating();
        $ratersCount = $model->getRatersCount();
        echo '<span id="total_rating">';
                    if ( ! $totalRating)
                        echo 'N/A';
                    else
                        echo '' . ((double)$totalRating / $ratersCount) .'/5 '. ' (dari ' . $ratersCount . ' pengguna)';
        echo '</span>';?>
    <?php
        $this->widget('CStarRating',array(
            'name'=>'rating',
            'maxRating' => 5,
            'minRating' => 1,
            'starCount' => 5,
            'allowEmpty' => false,
            'value' => $model->getRating(Yii::app()->user->id),
            'callback'=>'
            function(){
                    $.ajax({
                    type: "POST",
                    url: "'.Yii::app()->createUrl('infonesia/rating').'",
                    data: "id='.$model->namadaerah.'&username='.Yii::app()->user->id.'&rate=" + $(this).val(),
                    success: function(msg){
                         $("#total_rating > input").html(msg);
                    }
                })}'));
        
    ?>
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


