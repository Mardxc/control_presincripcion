<?php
/* @var $this EscAulasController */
/* @var $model EscAulas */

$this->breadcrumbs=array(
	'Esc Aulases'=>array('index'),
	$model->id_aula=>array('view','id'=>$model->id_aula),
	'Update',
);


?>

<?php 
/*echo CHtml::link('','index.php?r=escAulas/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Actualizar Aula',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>

<a href="index.php?r=escAulas/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1><?php echo $model->aula; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>