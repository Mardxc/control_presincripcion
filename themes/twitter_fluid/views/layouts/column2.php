<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
        
       <!-- <div class="span3">
         
          <?php
			
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operaciones',							
				'htmlOptions'=>array('class'=>'nav nav-header'),

					
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
			));
			$this->endWidget();
		  ?>
	
		
        </div>
-->
	<div class="span9">
		<div class="main">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

</div>
<?php $this->endContent(); ?>




