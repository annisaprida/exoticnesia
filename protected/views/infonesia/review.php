<?php
/* @var $this ReviewController */
/* @var $data Review */
?>

<div class="view">

        <table>
            <tr>
                <td width="65">
                    <?php if($data->username0->profils->avatar != null) : ?>
                        <div class="img-with-text" align="center">
                        <!-- <?php $img = '/images/'.$data->username0->profils->avatar ;?> -->
                        <img src="<?php echo Yii::app()->baseUrl;?>/images/pengguna/<?php echo $data->username?>/avatar/<?php echo $data->username0->profils->avatar;?>" width="64" height="64" />
                        <a href ="#"><?php echo CHtml::link($data->username0->username, array('/pengguna/view','id'=>$data->username0->username)); ?></a>
                        </div>
                    <?php else : ?>
                        <div class="img-with-text" align="center">
                        <img src="<?php echo Yii::app()->baseUrl;?>/images/pengguna/default-avatar.jpg" width="64" height="64" />
                        <a href ="#"><?php echo CHtml::link($data->username0->username, array('/pengguna/view','id'=>$data->username0->username)); ?></a>
                        </div>
                    <?php endif; ?>
                </td>
                <td width="450" style="text-align:justify"><?php echo CHtml::encode($data->isi); ?> </td>
            </tr>
        </table>
        <?php if(Yii::app()->user->isAdmin()) {
            $this->widget('bootstrap.widgets.TbButton',array(
                'url'=>'#',
                'type'=>'danger',
                'size'=>'small',
                'label'=>'Delete',
                'htmlOptions'=>array('confirm' => 'Are you sure to delete this review?','submit'=>array('deleteReview','id'=>$data->id, 'namadaerah'=>$data->namadaerah))
                ));
            }
            elseif(Yii::app()->user->id == $data->username) {
            $this->widget('bootstrap.widgets.TbButton',array(
                'url'=>'#',
                'type'=>'danger',
                'size'=>'small',
                'label'=>'Delete',
                'htmlOptions'=>array('confirm' => 'Are you sure to delete this review?',
                    'submit'=>array('deleteReview','id'=>$data->id, 'namadaerah'=>$data->namadaerah))
                ));           
         }
        ?>
</div>
