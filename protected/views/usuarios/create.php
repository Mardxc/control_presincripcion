<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Create',
);

?>

<?php 
/*echo CHtml::link('Administrar','index.php?r=Usuarios/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Crear Nueva Usuario',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>

 <a href="index.php?r=Usuarios/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<h1>Crear Usuarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>