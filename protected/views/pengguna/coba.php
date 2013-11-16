<?php echo $wishlistman->nama;
	$this->widget('bootstrap.widgets.TbEditableField', array(
	   'type'      => 'text',
	   'model'     => $wishlistman,
	   'attribute' => $wishlistman->nama,
	   'url'       => $this->createUrl('site/editable'),  //url for submit data
	   'enabled'   => true
	));
?>