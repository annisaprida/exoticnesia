<?php
  $dataProvider = new CActiveDataProvider('Foto',array(
      'pagination'=>array('pageSize'=>5),
      'criteria'=>array('condition'=> 'username=\''.$model->username.'\''),
  ));
?>
<h2> Gallery </h2>
<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
   'dataProvider'=>$dataProvider,
   'itemView'=>'galleryView',
   'htmlOptions'=>array('style'=>'margin-left:30px;'),
   // 'pager'=>array('header'=>'Pages'),
)); 
?>