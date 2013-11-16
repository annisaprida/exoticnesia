<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs',
	'stacked'=>true,
	'tabs'=>array(
		array('label'=>'Home', 'content'=>'Home Content', 'active'=>true),
		array('label'=>'Profile', 'content'=>'Profile Content'),
		array('label'=>'Messages', 'content'=>'Messages Content'),
	),
));
?>