<?php
/* @var $this EscEscuelasController */
/* @var $model EscEscuelas */

$this->breadcrumbs=array(
	'Esc Escuelases'=>array('index'),
	$model->id_escuela=>array('view','id'=>$model->id_escuela),
	'Update',
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

<h1>Actualizar Escuela: <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>