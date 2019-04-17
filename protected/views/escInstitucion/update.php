
<?php 
	/*echo CHtml::link('Administrar','index.php?r=escInstitucion/admin',
		array(
			'class'=>'fa fa-cog',
			'title'=>'Administrar Institucion',
			'style'=>'left:100%;float:right;
	    		font-size: 3.0em;'
	    )
	);*/
?>
<a href="index.php?r=escInstitucion/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<h1>Actualizar Institución: <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>