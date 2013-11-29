<?php
/* @var $this WishlistController */
/* @var $model Wishlist */

$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	$model->id0->nama,
);
$nw= ' - Wishlist ' . $model->id0->nama;

$this->pageTitle=Yii::app()->name . $nw;

// if(Yii::app()->user->id == $model->id0->username0->username) {
// 	$this->menu=array(
// 		array('label'=>'Edit Nama Wishlist', 'url'=>array('update', 'id'=>$model->no)),
// 	);
// }
?>

<!-- <h1>Wishlist #<?php echo $model->id0->nama; ?></h1> -->
<br/>
<br/>
<?php if(Yii::app()->user->id == $model->id0->username0->username) :?>
	<h1>Wishlist 
	<?php 
		$this->widget('bootstrap.widgets.TbEditableField', array(
				'type'=> 'text',
				'model'=> $model->id0,
				'attribute' => 'nama',
				'title'=> 'NO',
				'url'=> $this->createUrl('wishlist/editable'), 
				'title' => 'New party',
				'success' => 'js: function(data) {
								alert("BERHASIL EDIT NAMA WISHLIST!");
								document.location.reload(true);
							}',
			)
		);
	?>
	</h1>
<?php else : ?>
	<h1>Wishlist #<?php echo $model->id0->nama; ?></h1>
<?php endif; ?>
<?php 

$dataProvider = new CActiveDataProvider($model, array(
	'pagination'=>array('pageSize'=>1),
	'criteria'=>array('condition'=> 'id=\''.$model->id0->id.'\'')
	));

$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_wishlistpage',
	'enablePagination'=>true,
	));
?>

<div>
	<h4 style='text-align:right;'> You can share this wishlist! </h4> 
	<div style='float:right;'>
	    <a href="https://twitter.com/share" class="twitter-share-button" data-via="exoticnesia_" data-count="none">Tweet</a>

	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>

	<div style='float:right;margin-bottom:10px;'>
	    <?php 
	        $this->widget('bootstrap.widgets.SocialShareWidget', array(
	            'url' => 'http://exoticnesia.pusku.com/index.php?r=wishlist/view&id='.$model->id0->id .'',                  //required
	            'services' => array('facebook'),       //optional
	            'popup' => true,                               //optional
	        ));
	    ?>
	   
	</div>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model->id0,
	'attributes'=>array(
		'nama',
		array(
			'name' => 'Pemilik',
			'value'=> $model->id0->username0->profils->nama,
		),
	),
)); ?>
<br/>


