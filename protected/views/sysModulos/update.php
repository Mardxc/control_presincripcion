<?php
/* @var $this SysModulosController */
/* @var $model SysModulos */

$this->breadcrumbs=array(
	'Sys Moduloses'=>array('index'),
	$model->id_modulo=>array('view','id'=>$model->id_modulo),
	'Update',
);


?>
<?php 
/*echo CHtml::link('Administrar','index.php?r=SysModulos/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Crear Nueva Alumno',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>
 <a href="index.php?r=SysModulos/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1>Actualizar Modulo: <?php echo $model->modulo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>