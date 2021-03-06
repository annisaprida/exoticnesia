<div class="view" style="float:left; margin-right:20px; height: 250px; width:300px;" align="center">
<?php
    $dataProvider = new CActiveDataProvider('Wishlist',array(
        'pagination'=>array('pageSize'=>1,'pageVar'=>$data->id),
        'criteria'=>array('condition'=> 'id=\''.$data->id.'\''),
));
?>
  <?php echo CHtml::link($data->nama, array('/wishlist/view','id'=>$data->id, 'page'=>$page)) . ' by ' . CHtml::link($data->username, array('/pengguna/view','id'=>$data->username)); ?>      
	<?php 
        if(Yii::app()->user->id == $data->username && $page == 'profil') {
            echo CHtml::link('<button type="button" class="close">x</button>', 
                array('/wishlist/userdelete', 'id'=>$data->id, 'username'=>$data->username), array('confirm'=>'Apakah Anda yakin?'))."\n";
        }
     ?>
  <span>
     <?php $this->widget('bootstrap.widgets.TbListView', array(
         'dataProvider'=>$dataProvider,
         'template' => "{items}\n{pager}",
         'itemView'=>'/pengguna/wishview',
        ));
    ?>
  </span>
    <div style="clear:both;"></div>
</div>
