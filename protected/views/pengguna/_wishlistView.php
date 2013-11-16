<?php
    $dataProvider = new CActiveDataProvider('Wishlistmanager',array(
        'pagination'=>array('pageSize'=>6),
        'criteria'=>array('condition'=> 'username=\''.$model->username.'\''),
	));
?>
<h2> Wishlist </h2>
<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
       'dataProvider'=>$dataProvider,
       'itemView'=>'wishlistView',
       'htmlOptions'=>array('style'=>'margin-left:30px;'),
	)); 
?>