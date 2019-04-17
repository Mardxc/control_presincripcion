<?php
/* @var $this BasCarrerasController */
/* @var $model BasCarreras */

$this->breadcrumbs=array(
	'Bas Carrerases'=>array('index'),
	'Create',
);

?>
<a href="index.php?r=BasCarreras/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<?php 
/*echo CHtml::link('Administrar','index.php?r=BasPlanEstudios/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Nueva Carrera',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>
<h1>Crear Carrera</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>