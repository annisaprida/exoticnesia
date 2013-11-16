<?php
/* @var $this InfonesiaController */
/* @var $model Infonesia */

$this->breadcrumbs=array(
	'Infonesia'=>array('index'),
	'Manage',
);?>
<div>
<?php $this->menu=array(
	array('label'=>'Daftar Infonesia', 'url'=>array('index')),
	array('label'=>'Membuat Infonesia', 'url'=>array('create')),
);?>
</div>



<h1>Manage Infonesia</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'infonesia-grid',
	'fixedHeader'=>true,
	'headerOffset'=>40,
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'responsiveTable'=>true,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'namadaerah',
		array('header'=>'Manage',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {delete}',
			
		),
	),
)); 

?>
