<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Update',
);


?>

<?php 
/*echo CHtml::link('Administrar','index.php?r=SysProcesos/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Crear Nuevo Proceso',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>
 <a href="index.php?r=usuarios/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<h1>Actualizar Usuario: <?php echo $model->usuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>