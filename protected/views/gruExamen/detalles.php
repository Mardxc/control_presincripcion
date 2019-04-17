

<?php echo $this->renderPartial('GruGrupos/examen',array('model'=>$model)); ?>
<?php echo $this->renderPartial('GruGrupos/actions',array(
	'id_examen'=>$model->id_examen
)); ?>

<?php echo $this->renderPartial('GruGrupos/grupos', array('dataProviderGrupos'=>$dataProviderGrupos)); ?>
<div class="alert alert-danger" style="text-align:center;font-size:16px;background-color: #f2dede;" id="mensaje_grupos">
	Seleccione un grupo para editarlo o para agregarle alumnos
</div>
<?php 
	$this->widget('zii.widgets.jui.CJuiTabs',array(
		//'cssFile'=>'cjuitab.css',
	    'tabs'=>array(
	        'Información del Grupo'=>array(
	        	'model',
	        	'content'=>$this->renderPartial(
	                'GruGrupos/Datos',
	                array(
	                	'model'=>$model,
	                	'id_examen'=>$model->id_examen,
	                	'examen'=>$model->nombre
	                ),
	                TRUE
	            )
	        ),   
	    ),
	    'options'=>array(
	        'collapsible'=>true,
	    ),
	    'id'=>'MyTab-Menu',
	));
?>


