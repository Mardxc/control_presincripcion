<?php
/* @var $this SysProcesosController */
/* @var $model SysProcesos */

$this->breadcrumbs=array(
	'Sys Procesoses'=>array('index'),
	$model->id_proceso=>array('view','id'=>$model->id_proceso),
	'Update',
);

?>

<?php 
/*cho CHtml::link('Administrar','index.php?r=SysProcesos/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Crear Nuevo Proceso',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>

 <a href="index.php?r=SysProcesos/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1>Actualiza Proceso <?php echo $model->etiqueta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>