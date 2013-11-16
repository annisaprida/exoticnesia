<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon1.ico" type="image/x-icon" />
</head>

<body>

<div class="container" id="page">
 
	<div id="mainmenu">
    
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
			'brand'=> html_entity_decode(CHtml::image(Yii::app()->theme->baseUrl.'/images/logo5.png')),
			'brandOptions' => array('style'=>'width:auto;margin-left: 0px;'),
			// 'htmlOptions' => array('style' => 'position:absolute'),
			'collapse'=>true,
			'items'=>array(
				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-left'),
					'items' => array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Infonesia', 'url'=>array('/infonesia/index')),
						array('label'=>'Wishlist', 'url'=>array('/wishlist/index')),	
						array('label'=>'Forum', 'url'=>array('/forum/forum')),			
						array('label'=>'Search', 'url'=>array('/site/search')),
					),
				),

				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Profil', 'url'=>array('/pengguna/view', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest&&!Yii::app()->user->isAdmin()),
						array('label'=>'Khusus Admin', 'url'=>array('/infonesia/admin'), 'visible'=>Yii::app()->user->isAdmin()),
						array('label'=>'Logout (' .Yii::app()->user->name. ')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
				),
			),
			'type'=> 'inverse',
		)); ?>
	</div> <!--mainmenu -->
	
	<div class="breadcrumbs" style="top:50px;position:relative;padding-bottom:10px;">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	</div>
	
	<?php echo $content; ?>

<?php	
	$this->widget('bootstrap.widgets.TbNavbar',array(
		'brand' => 'Copyright 2013. Exoticnesia. All Rights Reserved.',
		'brandOptions' => array('style'=>'width:auto;margin: auto;font-size:12px;'),
		'brandUrl'=>'#',
		'type'=> 'inverse',
		'fixed'=>'bottom',
	));

?>

</div><!-- page -->

</body>
</html>