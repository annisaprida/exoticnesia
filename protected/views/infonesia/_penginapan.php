<?php
?>

<div class="view">


        <?php
        $criteria = new CDbCriteria;

        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'penginapan',
            'enablePagination'=>true,
            'enableSorting' => false,
        ));?>

</div>