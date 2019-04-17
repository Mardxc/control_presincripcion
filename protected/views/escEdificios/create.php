<?php
/* @var $this EscEdificiosController */
/* @var $model EscEdificios */

$this->breadcrumbs=array(
	'Esc Edificioses'=>array('index'),
	'Create',
);

?>

<?php 
/*echo CHtml::link('','index.php?r=EscEdificios/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Edificios',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
 ?>
<a href="index.php?r=EscEdificios/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>


<h1>Crear Edificio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>