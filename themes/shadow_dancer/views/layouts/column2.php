<?php $this->beginContent('//layouts/main'); ?>
<div class="container"  style="position:relative;margin-bottom:20px;">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar" style="margin-top:60px;">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'<span class="icon icon-sitemap_color">Operations</span>',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		
		
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>