<?php
/* @var $this SysPermisosController */
/* @var $model SysPermisos */

$this->breadcrumbs=array(
	'Sys Permisoses'=>array('index'),
	'Create',
);


?>

<?php 
/*echo CHtml::link('Administrar','index.php?r=SysPermisos/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Crear Nueva Permiso',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>
 <a href="index.php?r=SysPermisos/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<h1>Crear Permisos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>