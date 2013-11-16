<?php
?>

<div class="view">


        <?php
        $criteria = new CDbCriteria;

        $dataProvider = new CActiveDataProvider($data,array(
            'pagination'=>array('pageSize'=>10),
            'criteria'=>array('condition'=> 'namadaerah=\''.$model->namadaerah.'\'')

        ));

        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'review',
            'enablePagination'=>true,
            'enableSorting' => false,
        ));?>

</div>