<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
$this->pageTitle=Yii::app()->name . ' - Edit Profil';
$this->breadcrumbs=array(
	$model->username=>array('view','id'=>$model->username),
	'Edit Profil',
);

// $this->menu=array(
// 	array('label'=>'List Pengguna', 'url'=>array('index')),
// 	array('label'=>'Create Pengguna', 'url'=>array('create')),
// 	array('label'=>'View Pengguna', 'url'=>array('view', 'id'=>$model->username)),
// 	array('label'=>'Manage Pengguna', 'url'=>array('admin')),
// );
?>

<h1>Edit Profil <?php echo $model->profils->nama; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'pt'=>$pt, 'profil'=>$profil)); ?>