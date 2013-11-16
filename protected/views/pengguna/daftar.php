<?php
	$this->pageTitle=Yii::app()->name . ' - Pendaftaran';
	$this->breadcrumbs=array(
		'Pendaftaran',
	);
?>

<br/>
<p> Pendaftaran berhasil!<br/>
Email verifikasi telah dikirimkan ke alamat email anda.<br/><br/>

Note: </br>
- Jika email verifikasi tidak terdapat pada kotak masuk anda, silahkan cek pada kotak Spam anda <p>
<br/>
- Jika email verifikasi tidak sampai ke alamat email anda, anda dapat melakukan kirim ulang email verifikasi
<br/>
<?php 
	foreach(Yii::app()->user->getFlashes() as $key => $message){
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n"; 
	}
?>	
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary', 
			'label'=>'Kirim E-mail Verifikasi',
			'url'=>'#',
			'htmlOptions'=>array('submit'=>array('kirimulangemail', 'id'=>$model->username)),
		));
	?>
</div>