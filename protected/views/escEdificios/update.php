<?php
/* @var $this EscEdificiosController */
/* @var $model EscEdificios */

$this->breadcrumbs=array(
	'Esc Edificioses'=>array('index'),
	$model->id_edificio=>array('view','id'=>$model->id_edificio),
	'Update',
);


?>

<?php 
/*echo CHtml::link('','index.php?r=escEdificios/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Edificios',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>
<a href="index.php?r=escEdificios/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>

<h1> <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>