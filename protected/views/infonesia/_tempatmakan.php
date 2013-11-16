<?php
?>

<div class="view">

        <?php

        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'tempatmakan',
            'enableSorting' => false,
        ));?>

</div>