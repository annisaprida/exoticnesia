<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */
	$this->pageTitle=Yii::app()->name . ' - Pendaftaran';	

?>

<h1>Formulir Pendaftaran</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'pt'=>$pt, 'profil'=>$profil)); ?>
