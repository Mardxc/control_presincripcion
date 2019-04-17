<?php
/* @var $this EscEscuelasController */
/* @var $model EscEscuelas */

$this->breadcrumbs=array(
	'Esc Escuelases'=>array('index'),
	'Create',
);

?>

<?php 
/*echo CHtml::link('','index.php?r=EscEscuelas/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Escuelas',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>

<a href="index.php?r=EscEscuelas/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1>Crear Escuela</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>