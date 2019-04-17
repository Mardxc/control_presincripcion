<?php
/* @var $this BasPeriodoController */
/* @var $model BasPeriodo */

$this->breadcrumbs=array(
	'Bas Periodos'=>array('index'),
	$model->id_periodo=>array('view','id'=>$model->id_periodo),
	'Update',
);

?>

<?php /*
echo CHtml::link('','index.php?r=BasPeriodo/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Periodos',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>

<a href="index.php?r=BasPeriodo/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1><?php echo $model->periodo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>