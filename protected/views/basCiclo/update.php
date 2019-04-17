<?php
/* @var $this BasCicloController */
/* @var $model BasCiclo */

$this->breadcrumbs=array(
	'Bas Ciclos'=>array('index'),
	$model->id_ciclo=>array('view','id'=>$model->id_ciclo),
	'Update',
);


?>
<a href="index.php?r=basCiclo/admin" style="float:right;text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-cog fa-2x">Administrar</i>
</a>
<?php /*
echo CHtml::link('Administrar','index.php?r=BasCiclo/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Ciclo',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);*/
?>

<h1>Actualizar Ciclo <?php echo $model->ciclo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>